<template>
<div id="" name="" class="auth-box d-flex  align-items-center">
    <div class="box">
        <div class="inner-box">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="text-center mb-4">Round Two Instructions</h1>
                    <h4 class="text-center mb-4">
                 You will be given a crossword puzzle.  Download the puzzle. After you've finished solving, upload your answers as word document. You will receive 20 minutes to complete the task.                    </h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
                <form @submit="formProceedPuzzle" class="">
                    <div class="form-actions">
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary red-button round-button">Start</button>
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
    document.body.className = "puzzle-in-progress";
  },
  data() {
    return {};
  },
  mounted() {
    console.log("QuizInstructions Component mounted.");
  },
  methods: {
    formProceedPuzzle(e) {
      e.preventDefault();
      let currentObj = this;
      currentObj.$router.push("/puzzle");
    }
  }
};
</script>