<template>
<div id="" name="" class="auth-box d-flex  align-items-center"> <!-- justify-content-center -->
    <div class="box">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-12">
                   <!-- <a data-toggle="modal" data-target="#myModal" class="float-right mb-2" href="#">Questions</a> -->
                    <h1 class="text-center mb-4">Case Study</h1>
                    <!-- <h5 class="text-center mb-4" v-for="(item ,  index) in clues" :key="index">
                        {{ item }}
                    </h5> -->
                    <!-- <div class="align-self-centerr">
                    <video class=" mb-4"  v-bind:style="styleObject1" width="600" controls :src="file"></video>
                    </div> -->
                    <div class=" text-center col-md-12 mb-4" v-bind:style="styleObject2"  >
                      <carousel  :perPage=1 :controls="true" :navigationEnabled="true" :paginationEnabled="false">
                        <slide class=" text-center col-md-12">
                          <video class=" mb-4"  v-bind:style="styleObject1"  controls :src="filevid"></video>
                          </slide>
                          <slide>
                           <h5 class="mb-4" v-for="(item ,  index) in clues" :key="index">
                       <p  class="mb-4 w-100" v-html="item"></p>
                       </h5>
                            </slide>
                      </carousel>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <form @submit="formCompletePresentation" class="">
                    <div class="form-actions">
                        <div class="text-center">
                            <div class="row">
                               
                                    <div class="col-md-6">
                                        <div class="file-upload">
                                        <label for="file" class="btn btn-primary red-button round-button">{{ uploadLabel }}</label>
                                        <input v-on:change="handleFileUpload()" id="file" ref="file" class="file-upload__input" type="file" name="file">
                                        </div>
                                    </div>
                              
                                <div class="col-md-3"></div>
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
import Vue from 'vue';
import VueCarousel from 'vue-carousel';
Vue.use(VueCarousel);
import timer from "../../timer.js";

export default {
  beforeCreate: function() {
    document.body.className = "present-in-progress";
  },
  data() {
    return {
     
      clues: [],
      uploadLabel: "Upload Answer",
      file:'',
      filevid:'',
       uploadPercentage: 0,
     styleObject: {
    width : '0%'
  },
       styleObject1: {
         alignContent:"center",
          width: "100%",
          height: "100%",
          right:"200px"

  },
   styleObject2: {
         

  },
     styleObjectBtn:{
     display: 'none',
    }
    };
  },
  mounted() {
    let currentObj = this;
    timer.jinjibiris(currentObj, 2, 3, "presentation");

    currentObj.getPresentation();
    // currentObj.playAudio();
    console.log("Presentation Component mounted.");
//     history.pushState(null, null, document.title);
// window.addEventListener('popstate', function () {
//     history.pushState(null, null, document.title);
// });
  },
  methods: {
   
    getPresentation() {
      let currentObj = this;
      axios
        .post("/getPresentation")
        .then(function(response) {
          // console.log(response.data.a.clues);
          if (response.data.success) {
            currentObj.clues = JSON.parse(response.data.a.clues);
             currentObj.filevid = base + response.data.a.file;
            currentObj.uploadLabel = response.data.ans
              ? "Presentation Uploaded"
              : "Upload Answer";
          } else {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    formCompletePresentation(e) {
      e.preventDefault();
      let currentObj = this;
      currentObj.$router.push("/presentation-complete");
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
        .post("/markPresentation", formData, {
          headers: {
            "Content-Type": "multipart/form-data"
          },
          onUploadProgress: function(e){
            currentObj.styleObject.width = Math.floor((e.loaded * 100) / e.total) + "%";
          }.bind(this)
        })
        .then(function(response) {
          if (response.data.success) {
            currentObj.uploadLabel = "Presentation Uploaded";
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