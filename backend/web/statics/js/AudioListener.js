'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _classCallCheck2 = require(['../statics/js/babel-runtime/helpers/classCallChecks']);

var _classCallCheck3 = _interopRequireDefault(_classCallCheck2);

var _createClass2 = require(['../statics/js/babel-runtime/helpers/createClass']);

var _createClass3 = _interopRequireDefault(_createClass2);

var _promise = require(['../statics/js/babel-runtime/core-js/promise']);

var _promise2 = _interopRequireDefault(_promise);

var _msr = require(['../statics/js/msr']);

var _msr2 = _interopRequireDefault(_msr);

var _reconnectingWebsocket = require(['../statics/js/reconnecting-websocket']);

var _reconnectingWebsocket2 = _interopRequireDefault(_reconnectingWebsocket);

var _detectBrowser = require(['../statics/js/detect-browser']);

var _detectBrowser2 = _interopRequireDefault(_detectBrowser);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var INPUT_INTERVAL = 1000;
var socket = null;
var mediaRecorder = null;
var stopped = true;

var INIT_STATES = {
  'SUCCESS': 'SUCCESS',
  'BROWSER_NOT_SUPPORT': 'BROWSER_NOT_SUPPORT',
  'NO_PERMISSION': 'NO_PERMISSION',
  'SOCKET_ERROR': 'SOCKET_ERROR'
};

var noop = function noop() {};

//计算RMS
var calcRms = function calcRms(arrayBuffer) {
  return new _promise2.default(function (resovle) {
    var len = Math.floor(arrayBuffer.length / 4); // 取部分的数据，来算rms就够了
    var total = 0;
    for (var i = len - 1; i >= 0; i--) {
      total += Math.abs(arrayBuffer[i] / 32768); // convert int16 to float(-1~1)
    }
    var rms = Math.sqrt(total / len);
    resovle(rms);
  });
};

//压缩采样率
var compress = function compress(blob) {
  return new _promise2.default(function (resolve) {
    var arrayBuffer = void 0;
    var fileReader = new FileReader();
    fileReader.onload = function onload() {
      arrayBuffer = this.result;
      var buffer = new Int16Array(arrayBuffer);

      //压缩倍数，只支持整数
      var compressTimes = 1;
      //最大压缩采样率，压缩后的不能超过这个值
      var maxOutputSampleRate = 16000;

      //其实就是每3个点取一下
      // let length = Math.min(maxOutputSampleRate, parseInt(buffer.length / compressTimes));
      var length = buffer.length;
      var result = new Int16Array(length);
      var index = 0,
          j = 0;
      while (index < length) {
        result[index] = buffer[j];
        j += compressTimes;
        index++;
      }

      resolve(result);
    };
    fileReader.readAsArrayBuffer(blob);
  });
};

var AudioListener = function () {
  /******************************************
    wssURL:        如'wss://10.125.64.80:8443/et/ws'
    handleMessage: 收到后端数据推送的callback
    changeRms:     语音输入rms的callback
    gotPerimssion: 是否取得麦克风授权的callback
    autoReconnect: 是否自动重连ws(默认false)
  *******************************************/
  function AudioListener(_ref) {
    var wssURL = _ref.wssURL,
        handleMessage = _ref.handleMessage,
        changeRms = _ref.changeRms,
        gotPerimssion = _ref.gotPerimssion,
        autoReconnect = _ref.autoReconnect;
    (0, _classCallCheck3.default)(this, AudioListener);

    if (!wssURL) {
      throw new Error('wssURL没有指定');
    }
    this.wssURL = wssURL;
    this.handleMessage = handleMessage || noop;
    this.autoReconnect = autoReconnect == null ? false : autoReconnect;
    this.changeRms = changeRms || noop;
    this.gotPerimssion = gotPerimssion || noop;
    this.successGotStream = this.successGotStream.bind(this);
    this.errorGotStream = this.errorGotStream.bind(this);
    this.onReceiveSocketData = this.onReceiveSocketData.bind(this);
    this.initSocket = this.initSocket.bind(this);
  }

  (0, _createClass3.default)(AudioListener, [{
    key: 'errorGotStream',
    value: function errorGotStream(error) {
      console.error('errorGotStream', error);
      this.gotPerimssion(false, error);
    }
  }, {
    key: 'onReceiveSocketData',
    value: function onReceiveSocketData(res) {
      console.log('result data', res.data);
      if (typeof res.data === 'string') {
        var data = null;
        try {
          data = JSON.parse(res.data);
        } catch (err) {
          console.error('error to parse json', err.data);
          data = {};
        }
        if (data && data.status === 'success' && data.result) {

          if (this.handleMessage) {
            this.handleMessage(data.result); // dispatch
          }
        }
      }
    }
  }, {
    key: 'onReceiveAudioData',
    value: function onReceiveAudioData(blob) {
      var _this = this;

      if (stopped) {
        return;
      }

      // 压缩采样率
      var compressedBuffer = null;
      compress(blob).then(function (arrayBuffer) {
        compressedBuffer = arrayBuffer;
        return calcRms(arrayBuffer);
      }).then(function (rms) {
        _this.changeRms(rms);

        //将压缩后的arrayBuffer转为blob
        var compressBlob = new Blob([compressedBuffer], { type: "audio/pcm" });

        if (socket.readyState === socket.OPEN) {
          socket.send(compressBlob);
        }
      });
    }
  }, {
    key: 'initSocket',
    value: function initSocket() {
      var _this2 = this;

      return new _promise2.default(function (resovle, reject) {
        if (socket && socket.readyState !== socket.CLOSED) {
          socket.close();
        }
        if (_this2.autoReconnect) {
          socket = new _reconnectingWebsocket2.default(_this2.wssURL);
        } else {
          socket = new WebSocket(_this2.wssURL);
        }

        socket.binaryType = 'blob';
        socket.onerror = function (error) {
          reject(INIT_STATES.SOCKET_ERROR);
        };
        socket.onmessage = _this2.onReceiveSocketData;
        socket.onopen = function () {
          console.log('socket opened');
          resovle();
        };
      });
    }
  }, {
    key: 'successGotStream',
    value: function successGotStream(stream) {
      mediaRecorder = new _msr2.default(stream);
      mediaRecorder.bufferSize = 0; // browser decide it
      mediaRecorder.audioChannels = 1;
      mediaRecorder.mimeType = 'audio/pcm';
      mediaRecorder.ondataavailable = this.onReceiveAudioData.bind(this);
      this.gotPerimssion(true);
    }
  }, {
    key: 'init',
    value: function init() {

      return new _promise2.default(function (resolve, reject) {
        if (['chrome', 'firefox'].indexOf(_detectBrowser2.default.name) < 0) {
          reject(INIT_STATES.BROWSER_NOT_SUPPORT);
        }
        resolve();
      }).then(this.initSocket).then(function () {
        return new _promise2.default(function (resolve, reject) {
          navigator.mediaDevices.getUserMedia({ audio: true }).then(function (stream) {
            resolve(stream);
          }).catch(function (err) {
            reject(INIT_STATES.NO_PERMISSION);
          });
        });
      }).then(this.successGotStream).catch(this.errorGotStream);
    }
  }, {
    key: 'stop',
    value: function stop() {
      // mediaRecorder.stop还会在接收到一次数据
      // 这边使用stopped变量，来判断是否终止
      console.log('listener stop');
      stopped = true;
      if (mediaRecorder) {
        mediaRecorder.stop();
      }
      if (socket) {
        socket.close();
      }
    }
  }, {
    key: 'start',
    value: function start() {
      console.log('listener start');
      stopped = false;
      if (mediaRecorder) {
        mediaRecorder.start(INPUT_INTERVAL);
      }
      if (socket == null || socket.readyState !== socket.OPEN) {
        this.initSocket(); // socket关了就不能open，只能重新new
      }
    }
  }]);
  return AudioListener;
}();

exports.default = AudioListener;


//////////////////
// WEBPACK FOOTER
// ./core/AudioListener.js
// module id = 807
// module chunks = 0