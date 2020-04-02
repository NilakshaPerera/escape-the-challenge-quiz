<template>
<div id="" name="" class="auth-box d-flex justify-content-center align-items-center">
<div class="box">
   <h2 class="text-center mb-4">Please enter your team details</h2>
    <form @submit="formUpdateTeam" id="frmstudent" name="frmstudent" class="form-element">
          <div id="demo" class="form-group mb-4 text-center">
            <input class="btn btn-danger mb-2 round-button" type="button" @click="AddField" value="add team member details">
            <br>
          <div class="mb-1" v-for="(item, i) in field0" >
            <!-- <input type="hidden" v-model="field0[i]" > -->
            <input class="col-sm-3 round-input" v-model="field1[i]" placeholder="Name">
            <input class="col-sm-3 round-input" v-model="field2[i]" placeholder="Email">
            <input maxlength="10" class="col-sm-3 round-input" v-model="field3[i]" placeholder=" P No">
            <input  class="btn btn-success col-sm-1 " type="button" @click="AddField" value="+">
            <input class="btn btn-danger col-sm-1" type="button" @click="removeField" value="-">
            
          </div>

          </div>

        <div class="form-group mb-4">
          <h4 class="mt-3">Teacher</h4>
            <div class="row">
            <input class="col-sm-4 round-input" v-model="teacher" placeholder="Name" required>
            <input class="col-sm-4 round-input" v-model="teacher_email" placeholder="Email" required>
            <input maxlength="10" class="col-sm-4 round-input" v-model="teacher_phone" placeholder=" P No" required>
            </div>
        </div>
          
        <h4 class="mt-3 mb-2">Team leader details </h4>
         <div class="form-group mb-4">
            <input v-model="lead" type="text" class="form-control round-input" placeholder="Team Lead">
        </div>

        <div class="form-group mb-4">
            <input v-model="school" type="text" class="form-control round-input" placeholder="School">
        </div>

       

        <div class="form-actions">
            <div class="text-center">
                <button type="submit" class="btn btn-primary red-button round-button">Next</button>
            </div>
            <div class="text-center">
              {{output}}
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
    return {
      lead: "",
      email: "",
      school: "",
      // contact: "",
      output: "",
      teacher:"",
      teacher_email:"",
      teacher_phone:"",
       field0: [],
      field1: [] ,
      field2: [],
      field3: []
    };
  },
  mounted() {
    console.log("StudentForm Component mounted.");
    let currentObj = this;
    axios
      .get("/student")
      .then(function(response) {
        currentObj.lead = response.data.data.name;
        currentObj.email = response.data.data.email;
        currentObj.school = response.data.data.school;
        //  currentObj.contact = response.data.data.contact;
         currentObj.teacher = response.data.data.teacher;
        currentObj.teacher_phone = response.data.data.teacher_phone;
        currentObj.teacher_email = response.data.data.teacher_email;
      })
      .catch(function(error) {
        console.log(error);
      });
  },
  methods: {
    formUpdateTeam(e) {
      e.preventDefault();
      let currentObj = this;
      axios
        .post("/student", {
          school : this.school,
          // contact : this.contact,
          teacher : this.teacher,
          teacher_phone : this.teacher_phone,
          teacher_email : this.teacher_email,
          name: currentObj.field1,
          email: currentObj.field2,
          phone: currentObj.field3
        })
        .then(function(response) {
          if (response.data.success) {
            currentObj.output = response.data.message[0];
           currentObj.$router.push('/instructions');
          } else {
            currentObj.output = response.data.errors[0];
          }
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    },
   AddField: function () {
      this.field0.push('');
    },
    removeField(i){
     this.field0.splice(i, 1);
    }
  }
};
</script>
