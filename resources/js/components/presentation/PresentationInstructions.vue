<template>
<div id="" name="" class="auth-box d-flex  align-items-center">
    <div class="box">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="text-center mb-4">Round Three Instructions</h1>
                    <h4 class="text-center mb-4">
                You will receive a video along with a set of questions. <br> Watch and observe the video and answer the questions. <br>  Upload the answers as a .ppt document.<br> You will receive 40 minutes to complete the task.                    </h4>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-10">
                <form  @submit="formProceedPresentation" class="">
                    <div class="form-actions">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary red-button round-button">Next</button>
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
export default {
  beforeCreate: function() {
    document.body.className = "present-in-progress";
  },
  data() {
    return {};
  },
  mounted() {
    console.log("QuizInstructions Component mounted.");
  },
  methods: {
    formProceedPresentation(e) {
      e.preventDefault();
      let currentObj = this;
      currentObj.$router.push("/presentation");
    }
  }
};
</script>