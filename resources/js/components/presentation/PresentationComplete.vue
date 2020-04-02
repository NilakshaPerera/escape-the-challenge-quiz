<template>
<div id="" name="" class="auth-box d-flex  align-items-center">
    <div class="box">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="text-center h0 mb-4">Congratulations!</h1>
                    <h4 class="text-center mb-4">
                        You have completed the Round Three Challenge.<br>Click <b>Exit</b> button to Complete the quiz.
                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <form class="">
                    <div class="form-actions">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button @click="endSession" type="button" class="btn btn-primary red-button round-button">Exit quiz</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import app from "../../app.js";
export default {
  beforeCreate: function() {
    document.body.className = "present-complete";
  },
  data() {
    return {};
  },
  mounted() {
      let currentObj = this;
    console.log("QuizComplete Component mounted.");
    currentObj.playAudio();
  },
  methods: {
    endSession(){
      app.endSession();
    },
     playAudio(){
     
       var song = base + 'uploads/audio/door.mp3';
      var audio = new Audio(song);
      audio.play();
      console.log("Audio Component mounted.");
    }
  }
};
</script>