'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.init = exports.clickRecordBtn = undefined;

var _AudioListener = require(['../statics/js/core/AudioListener']);

var _AudioListener2 = _interopRequireDefault(_AudioListener);

var _constants = require(['../statics/js/constants']);

var _httpProvider = require(['../statics/js/core/httpProvider']);

var _httpProvider2 = _interopRequireDefault(_httpProvider);

var _httpConfig = require(['../statics/js/core/httpConfig']);

var _httpConfig2 = _interopRequireDefault(_httpConfig);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

// import {ETMOUTH_STATE, ETMOUTH_INTERVAL} from '../../../components/ETMouth/constants';
var audioListener = null;
var audioServiceTimer = null;

var clickRecordBtn = exports.clickRecordBtn = function clickRecordBtn(e) {
  return function (dispatch, getState) {
    var _getState$asr = getState().asr,
        initState = _getState$asr.initState,
        isRecording = _getState$asr.isRecording;


    var http = (0, _httpProvider2.default)(_httpConfig2.default);
    http.get(_constants.HTTP_URL);

    // 刷新进入页面时没有initState，或者被拒绝的状态
    if (initState == null) {
      audioListener.init();
    }
    // 如果之前已有权限，且没在录音状态
    else if (!isRecording) {
        startListening(dispatch);
      }
  };
};

var stopListening = function stopListening(dispatch) {
  console.log('stopListening!');
  audioListener.stop();
  dispatch({
    type: _constants.GET_DATA,
    payload: {
      isRecording: false,
      volumeRMS: 0,
      audioResult: {},
      initState: null
    }
  });
};

var startListening = function startListening(dispatch) {
  console.log('startListening!');

  var audioServiceTimer = null;
  if (audioServiceTimer != null) {
    clearTimeout(audioServiceTimer);
  }
  audioServiceTimer = setTimeout(function () {
    stopListening(dispatch);
  }, _constants.AUDIO_SERVICE_MAX_DURATION);

  audioListener.start();
  dispatch({
    type: _constants.GET_DATA,
    payload: {
      audioResult: {},
      isRecording: true,
      contentText: '请随便对我说些什么吧！|我可以识别你说话的内容喔！'
    }
  });
};

// 开始接收语音，与后端持续通讯(websocket)
var init = exports.init = function init() {
  return function (dispatch, getState) {

    audioListener = new _AudioListener2.default({
      wssURL: _constants.WSS_URL,
      autoReconnect: false,
      handleMessage: function handleMessage(audioResult) {
        // debugger;
        dispatch({
          type: _constants.GET_DATA,
          payload: {
            audioResult: audioResult
          }
        });
      },
      changeRms: function changeRms(rms) {
        console.log('rms', rms);
        dispatch({
          type: _constants.GET_DATA,
          payload: {
            volumeRMS: rms
          }
        });
      },
      gotPerimssion: function gotPerimssion(success, reason) {

        var initState = null;
        if (success) {
          startListening(dispatch);
          initState = 'SUCCESS';
        } else {
          initState = reason;
        }
        dispatch({
          type: _constants.GET_DATA,
          payload: {
            initState: initState
          }
        });
      }
    });
  };
};

var audioReadyCB = function audioReadyCB(buffer, dispatch) {
  // distach ready state to let ET open mouth
  dispatch({
    type: _constants.GET_DATA,
    payload: {
      speakState: ETMOUTH_STATE.SPEAKING
    }
  });

  // after ET open month then start playing
  setTimeout(function () {
    audioPlayer.play(buffer, function () {
      return audioEndCB(dispatch);
    });
  }, ETMOUTH_INTERVAL.IDLE2SPEAKING_DURATION);
};

var audioEndCB = function audioEndCB(dispatch) {
  // then ET close month
  dispatch({
    type: _constants.GET_DATA,
    payload: {
      speakState: ETMOUTH_STATE.IDLE
    }
  });
};


//////////////////
// WEBPACK FOOTER
// ./pages/asr/flow/actions.js
// module id = 806
// module chunks = 0