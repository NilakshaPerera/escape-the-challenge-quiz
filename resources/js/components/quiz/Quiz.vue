<template>
<div id="" name="" class="auth-box d-flex  align-items-center">
    <div class="box">
        <div class="inner-box">
        <div class="row">
            <div class="col-md-10">
                <div class="">
                    <h4 class="mb-4" v-html="question">
                        {{question}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <div class="row mb-4 pt-2">
                    <div v-for="(item , index  ) in items" class="col-md-6 mb-4" :key="index">
                     <!--  <input v-model="selected" v-bind:value="index" v-on:change="setAnswer" :checked="a == index" style="vertical-align: middle;" name="answer" type="radio"> -->
                       <input v-model="selected" v-bind:value="index" v-on:change="setAnswer"  style="vertical-align: middle;" name="answer" type="radio" class="radio-answer">
                      
                        <span> {{ item }} </span>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-10">
                <form @submit="formCompleteQuiz" class=""> <!-- form-element -->
                    <div class="form-actions">
                        <div class="text-center">
                          <div class="row">
                            <!-- <button v-if="p" @click="previous" type="button" class="btn btn-primary red-button round-button">Previous</button> -->
                            <div class="col-md-6"></div>
                          <div class="col-md-3">
                            <button v-if="b" @click="back" type="button" class="btn btn-primary red-button round-button">Back</button>
                          </div>
                          <div class="col-md-3">
                            <button v-if="n" @click="next" type="button" class="btn btn-primary red-button round-button">Next</button>
                            <button v-if="f" @click="stop" type="button" class="btn btn-primary red-button round-button">Finish</button>
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
import timer from "../../timer.js";
export default {
  beforeCreate: function() {
    document.body.className = "quiz-in-progress";
  },
  data() {
    return {
      selected: "",
      currentId: null,
      question: "",
      items: [],
      p: true,
      b: 0,
      n: 0,
      f: false,
      i: 0,
      a: 0
    };
  },
  mounted() {
    console.log("Quiz Component mounted.");
    //  let currentObj = this;

    timer.jinjibiris(this, null, 1, "mcq");
    this.getMcq(this.$route.params.q);
//     history.pushState(null, null, document.title);
// window.addEventListener('popstate', function () {
//     history.pushState(null, null, document.title);
// });
  },
  methods: {
    formCompleteQuiz(e) {
      e.preventDefault();
      this.$router.push("/quiz-complete");
    },
    previous() {
      //     let currentObj = this;
      this.$router.push("/quiz-instructions");
    },
    next() {
      let currentObj = this;
      this.$router.push({ name: "/quiz", params: { q: this.n } });
      this.getMcq(this.$route.params.q);
    },
    back() {
      //    let currentObj = this;
      this.$router.push({ name: "/quiz", params: { q: this.b } });
      this.getMcq(this.$route.params.q);
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
        .confirm("<h4>Are you sure you want to finish and proceed?</h4>", options)
        .then(function() {
          timer.stopTimer();
        })
        .catch(function() {});
    },
    async getMcq(param) {
      let currentObj = this;
      axios
        .post("/getMCQ/" + param, {
          q: param
        })
        .then(function(response) {
          if (response.data.success) {
            currentObj.question = response.data.c.question;
            currentObj.items = JSON.parse(response.data.c.answers);

            currentObj.n = response.data.n;
            currentObj.f = response.data.n ? false : true;
            currentObj.b = response.data.b;
            currentObj.i = response.data.i;
            currentObj.a = response.data.a;

            currentObj.setRadio(response.data.a);
          } else {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    setAnswer() {
      var self = this;
      axios
        .post("/mark-mcq-answer", {
          answer: this.selected,
          question: this.i
        })
        .then(function(response) {
          if (response.data.success) {
            console.log(response.data.message);
          } else {
          }
        })
        .catch(function(error) {
          console.log(error);
        });
    },
    setRadio(ans) {
      $(".radio-answer").each(function(index) {
        var val = $(this).val();
        if (ans == val) {
          $(this).prop("checked", true);
        } else {
          $(this).prop("checked", false);
        }
      });
    }
  }
};
</script>