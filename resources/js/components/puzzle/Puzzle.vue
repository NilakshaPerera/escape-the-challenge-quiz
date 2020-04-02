<template>
<div id="" name="" class="auth-box d-flex  align-items-center">
    <div class="box">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="text-center mb-4">Round two Question</h1>
                    <h4 class="text-center mb-4">
                      'Content here, content here', making it look like readable English.
                    </h4>
                </div>
            </div>

             <div class="row">
                <div class="col-md-10">
                    <div class="row"> 
                        <div class="col-md-6"> 
                            <h4>Across </h4>
                            <div v-for="(ac_item ,  a_index) in across" :key="a_index">
                                <span>{{ ac_item }}</span>
                            </div>
                        </div>
                        <div class="col-md-6"> 
                            <h4>Down </h4>
                            <div v-for="(do_item , b_index) in down" :key="b_index">
                                <span>{{ do_item }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <form class="">
                    <div class="form-actions">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="file-upload">
                                        <label for="file" class="btn btn-primary red-button round-button">{{ uploadLabel }}</label>
                                        <input v-on:change="handleFileUpload()" id="file" ref="file" class="file-upload__input" type="file" name="file">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <a :href="puzzle" target="_blank" class="btn btn-primary red-button round-button" title="Click to download the puzzle">Puzzle</a>
                                </div>
                                <div class="col-md-3">
                                    <button @click="stop" type="button" class="btn btn-primary red-button round-button">Finish</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <div class="modal fade custom-modal custom-modal1"  id="modalProgress" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-body mb-3">
                <div  class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" v-bind:style="styleObject" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
            <div class="modal-footer" v-bind:style="styleObjectBtn" >
              <button type="button"   class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
      </div>
       </div>
    </div>
</div>
</template>

<script>
import timer from "../../timer.js";
export default {
  beforeCreate: function() {
    document.body.className = "puzzle-in-progress";
  },
  data() {
    return {
      across: [],
      down: [],
      uploadLabel: "Upload Answer",
      file: "",
      uploaded: false,
      puzzle: "",
      uploadPercentage: 0,
     styleObject: {
    width : '0%'
  },
     styleObjectBtn:{
     display: 'none',
    }
    };
  },
  mounted() {
    let currentObj = this;
    timer.jinjibiris(currentObj, 1, 2, "puzzle");

    currentObj.getPuzzle();

    console.log("Quiz Component mounted.");
//     history.pushState(null, null, document.title);
// window.addEventListener('popstate', function () {
//     history.pushState(null, null, document.title);
// });
  },
  methods: {
    getPuzzle() {
      let currentObj = this;
      axios
        .post("/getPuzzle")
        .then(function(response) {
          if (response.data.success) {
            currentObj.puzzle = base + response.data.a.file;

            currentObj.across = JSON.parse(response.data.a.clues_a);
            currentObj.down = JSON.parse(response.data.a.clues_d);
            currentObj.uploadLabel = response.data.ans
              ? "Puzzle Uploaded"
              : "Upload Answer";
          } else {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    formCompletePuzzle(e) {
      e.preventDefault();
      return;
      let currentObj = this;
      currentObj.$router.push("/puzzle-complete");
    },
    stop() {
      let options = {
        html: true, // set to true if your message contains HTML tags. eg: "Delete <b>Foo</b> ?"
        loader: false, // set to true if you want the dailog to show a loader after click on "proceed"
        reverse: false, // switch the button positions (left to right, and vise versa)
        okText: "Continue",
        cancelText: "Cancel",
        animation: "fade", // Available: "zoom", "bounce", "fade"
        type: "basic", // coming soon: 'soft', 'hard'
        verification: "continue", // for hard confirm, user will be prompted to type this to enable the proceed button
        verificationHelp: 'Type "[+:verification]" below to confirm', // Verification help text. [+:verification] will be matched with 'options.verification' (i.e 'Type "continue" below to confirm')
        clicksCount: 3, // for soft confirm, user will be asked to click on "proceed" btn 3 times before actually proceeding
        backdropClose: false, // set to true to close the dialog when clicking outside of the dialog window, i.e. click landing on the mask
        customClass: "conf-dialog" // Custom class to be injected into the parent node for the current dialog instance
      };
      this.$dialog
        .confirm(
          "<h4>Are you sure you want to finish and proceed?</h4>",
          options
        )
        .then(function() {
          timer.stopTimer();
        })
        .catch(function() {});
    },
    handleFileUpload() {
      let currentObj = this;
      this.file = this.$refs.file.files[0];
      this.uploadLabel = this.file["name"];
      console.log(this.file["name"]);

      let formData = new FormData();
      formData.append("file", this.file);
      currentObj.styleObject.width  = "0%";
      currentObj.styleObjectBtn.display ='none';
      timer.modalshow();
      axios
        .post("/markPuzzle", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          },
           onUploadProgress: function(e){
            currentObj.styleObject.width = Math.floor((e.loaded * 100) / e.total) + "%";
          }.bind(this)

        })
        .then(function(response) {
          if (response.data.success) {
            currentObj.uploadLabel = "Puzzle Uploaded";
          } else {
          }
           timer.modalhide();
           currentObj.styleObjectBtn.display ='block';
        })
        .catch(function(error) {
          console.log(error);
        });
    }
  }
};
</script>