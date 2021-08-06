  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <header>Discaj</header>
    
           <form class="user" @submit.prevent="register">

          <form class="user" @submit.prevent="patientUpdate"> 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="forms.id">
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="exampleInputFirstName" placeholder="Nama mengikut kad pengenalan" v-model="forms.name" disabled>
                     <small class="text-danger" v-if="errors.name">{{errors.name[0]}}</small>
                     </b-col>
                         <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="forms.kp_passport" disabled>
                         <small class="text-danger" v-if="errors.kp_passport">{{errors.kp_passport[0]}}</small>
                  </b-col>
                      </b-row>
                      <b-row>
                   <b-col>
                      <label>Simptomatik</label>
                        <select class="form-control" id="name" v-model="form.symptomatic">                  
                        <option >Ya</option>
                        <option >Tidak</option>
                        </select>
                    </b-col>

                     <b-col>
                      <label>Onset</label>
                      <input type="date" class="form-control" id="epid" v-model="form.onset">
                         <small class="text-danger" v-if="errors.onset">{{errors.onset[0]}}</small>
                    </b-col>
                    </b-row>
                  
                  <b-row>
                  <b-col>
                      <label>Jenis Saringan</label>
                     <select class="form-control" id="screening" v-model="form.screening_type"> 
                       <option >Bergejala</option>  
                       <option >Bersasar</option>               
                        <option >Kontak</option>
                        <option >Komuniti</option>
                        <option >Kluster</option>
                        <option >Masuk Kerja</option>
                        <option >BID</option>
                        </select>
                         <small class="text-danger" v-if="errors.screening_type">{{errors.screening_type[0]}}</small>
                   </b-col>
                   <b-col>
                        <label>Jenis Exposure</label>
                     <select class="form-control" id="exposure" v-model="form.exposure_type"> 
                       <option >Tempatan</option>  
                       <option >Import A</option>               
                        <option >Import B</option>
                        <option >Import C</option>
                       
                        </select>
                         <small class="text-danger" v-if="errors.exposure_type">{{errors.exposure_type[0]}}</small>
                   </b-col>
                  <b-col>
                      <label>Reinfection?</label>
                       <select class="form-control" id="reinfection" v-model="form.reinfection"> 
                       <option >Ya</option>  
                       <option >Tidak</option>    
                       
                        </select>
                  </b-col>
                  </b-row>

                  <b-row>
                     <b-col>
                      <label>Tarikh Sampel</label>
                      <input type="date" class="form-control" id="datesample" v-model="form.date_sample">
                         <small class="text-danger" v-if="errors.date_sample">{{errors.date_sample[0]}}</small>
                   </b-col>
                     <b-col>
                      <label>Jenis Sampel</label>
                       <select class="form-control" id="reinfection" v-model="form.type_sample"> 
                       <option >PCR</option>  
                       <option >RTK-Ag</option>    
                       <small class="text-danger" v-if="errors.type_sample">{{errors.type_sample[0]}}</small>
                        </select>
                  </b-col>
                      <b-col>
                      <label>Tarikh Sampel di MKA</label>
                      <input type="date" class="form-control" id="datemka" v-model="form.date_mka">
                   </b-col>
                    </b-row>
                      <b-row>
                     <b-col>
                      <label>Grading</label>
                      <input type="text" class="form-control" id="grading" v-model="form.grading">
                         <small class="text-danger" v-if="errors.grading">{{errors.grading[0]}}</small>
                   </b-col>
                    <b-col>
                      <label>Tarikh Keputusan</label>
                     <input type="date" class="form-control" id="dateresult" v-model="form.date_result">
                         <small class="text-danger" v-if="errors.date_result">{{errors.date_result[0]}}</small>
                    </b-col>
                    </b-row>
                            <b-row>
            
                    <b-col>
                      <label>Tarikh 1st Dose</label>
                     <input type="date" class="form-control" id="1stdose" v-model="form.first_dose_date">
                    </b-col>
                     <b-col>
                      <label>Tarikh 2nd Dose</label>
                     <input type="date" class="form-control" id="2nddose" v-model="form.second_dose_date">
                    </b-col>
                    </b-row>
                    <br>
                    <div class="form-group">
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" @click="patientUpdate(patient.id)">Kemaskini</button>
               
                    </div>
               
                  </form> 

          </div>

              </div>
            </div>
      
          <!--Row-->


</template>



<script type="text/javascript">
import Header from '../container/Header.vue';
 
  export default {
      created(){
    
            Header  if (!User.loggedIn()) {
        this.$router.push({name: '/'})

    
      }
  
      let token = localStorage.getItem('token');
    if(!token){
      this.$router.push({name: '/'})
      }
    },
      
     mounted(){
     let roles = localStorage.getItem('roles');
      if(roles.includes("user")-1){
      this.$router.push({name: 'home'})
      Notification.unauthorized()
    }
 

        this.allPatient();
        this.allCases();
        this.district();
        this.hospital();
      },

      
     data(){
      return{
          selectedRN: false,
          patients:[],
          races:[],
          areas:[],
          districts:[],
          localities:[],
          hospitals:[],
        

          views:[],  
          form:{         
          kp_passport: null,
          sypmtomatic: null,
          onset: null,
          screening_type: null,
          exposure_type: null,
          reinfection: null,
          date_sample: null,
          type_sample: null,
          date_mka: null,
          grading: null,
          date_result: null,
          vaccine_type: null,
          first_dose_date:null,
          second_dose_date: null,
          notes: null,
        },
          forms:{
          kp_passport: null,
          sypmtomatic: null,
          onset: null,
          screening_type: null,
          exposure_type: null,
          reinfection: null,
          date_sample: null,
          type_sample: null,
          date_mka: null,
          grading: null,
          date_result: null,
          vaccine_type: null,
          first_dose_date:null,
          second_dose_date: null,
          notes: null,
      
        },
      
       
        errors:{},     
        
        itemize: [
          {
            text: 'PKRC',
            href: '/'
          },
          {
            text: 'Discaj',
            active: true
          },
        ],
          modalShow: false,

        perPage: 5,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
        sortBy: 'reg_number',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
           { key: 'reg_number', label: 'RN', sortable: true, sortDirection: 'desc' },
          { key: 'name', label: 'Nama', sortable: true, sortDirection: 'asc' },
          { key: 'kp_passport', label: 'No. Kad Pengenalan/Passport', sortable: true, sortDirection: 'desc' },
          { key: 'date', label: 'Tarikh Disaj', sortable: true, sortDirection: 'desc' },
          { key: 'duration', label: 'Bilangan Hari', sortable: true, sortDirection: 'desc' },
          { key: 'type_dc', label: 'Jenis Discharges', sortable: true, sortDirection: 'desc' },
          { key: 'notes', label: 'Catatan', sortable: true, sortDirection: 'desc' },
           { key: 'actions', label: 'Actions' },
        ],
        table:'',
      }
 





    },
        
      computed:{
      filtersearch(){
      return this.users.filter(user => {
         return user.name.match(this.searchTerm)
      }) 
      },
      rows() {
        return this.items.length
      }
    },
 
  methods:{
      allPatient(){
    let self = this;
     axios.get('/api/admissions/')
      .then(function (response) {
        self.patients = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
    getRecord(){
      let self = this;
    let id = this.selectedRN;
    axios.get('api/admissions/' + id)
        .then(function (response) {
        self.form = response.data;
        })
      this.$refs['my-modal']
        // ensure response data match the keys in the component's data.form property
    
},
      allCases(){
    let self = this;
     axios.get('/api/discharges/')
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

    district(){
    let self = this;
     axios.get('/api/district/')
      .then(function (response) {
        self.districts = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

     hospital(){
    let self = this;
     axios.get('/api/hospital/')
      .then(function (response) {
        self.hospitals = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },

      deleteUser(id){
                Swal.fire({
                  title: 'Anda pasti?',
                  text: "Tindakan ini memadamkan data!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Teruskan'
                }).then((result) => {
                  if (result.value) {
                    axios.delete('/api/sampling/'+id)
                  .then(() => {
                    window.location.reload()
                    this.users = this.users.filter(user => {
                      return user.id != id
                    })
                  })
                  .catch(() => {
                  
                  })
                    Swal.fire(
                      'Deleted!',
                      'Telah dipadamkan.',
                      'success'
                    )
                  }
                })

      },
           
      showModal() {
        this.$refs['my-modal'].show()
      },
       hideModal() {
        this.$refs['edit-modal'].hide()



        
      },
       toggleModal(id) {
         axios.get('/api/discharge/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
 
   
       register(){
          axios.post('/api/discharge', this.form)
          .then(() => {
        window.location.reload()
        Notification.success()
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data Entry'
            })
          )
        },
      patientUpdate(){
       let id = this.forms.id
       axios.patch('/api/discharge/'+id, this.forms)
       .then(() => {    
         let self = this;
        axios.get('/api/discharges/')
       .then(function (response) {
        self.items = response.data;
        })
         this.$refs['edit-modal'].hide(); 
        Notification.success();
    
       })
       .catch(error =>this.errors = error.response.data.errors)
       
     },

         viewModal(record) {
          let self = this;
            axios.get('/api/discharge/'+record.id)
  	     .then(function (response) {
        self.views = response.data;
        })
        this.$refs['view-modal'].toggle('#toggle-btn')
   
  },

 },
  }   
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>