<template>
<div id="" name="" class="auth-box d-flex justify-content-center align-items-center">
<div class="box">
   <h1 class="text-center mb-4">Round One Instructions</h1>
   <h4 class="text-center mb-4">
       You will receive 10 Multiple-Choice questions. You have to provide answers within the time limit of 20 minutes.
   </h4>
    <h1 class="text-center mb-4">Round Two Instructions</h1>
   <h4 class="text-center mb-4">
       You will receive 10 Multiple-Choice questions. You have to provide answers within the time limit of 20 minutes.
   </h4>
    <h1 class="text-center mb-4">Round Three Instructions</h1>
   <h4 class="text-center mb-4">
     You will receive a video along with a set of questions.  Watch and observe the video and answer the questions.  Upload the answers as a .ppt document.  You will receive 40 minutes to complete the task.
   </h4>
    <form  @submit="formProceedInstructions" class="form-element">
         <div class="form-actions">
            <div class="text-center">
                <button type="submit" class="btn btn-primary red-button round-button">Next</button>
            </div>
            <div class="text-center">
            </div>
        </div>
    </form>
</div>
</div>
</template>

<script>
export default {
       beforeCreate: function() {
        document.body.className = 'default';
    },
  data() {
      return {};
  },
  mounted() {
    console.log("Instructions Component mounted.");
  },
  methods: {
    formProceedInstructions(e) {
      e.preventDefault();
      let currentObj = this;
      currentObj.$router.push('/quiz-instructions');
    }
  }
};
</script>