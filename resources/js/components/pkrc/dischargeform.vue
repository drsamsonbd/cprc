  

<template v-for="table">
  
  <div>
 <b-breadcrumb :items="itemize"></b-breadcrumb>
 <hr>
 <div class="row">
   <div class="col-lg-12 ">
   

    <header>Discaj</header>
    
          <form class="user" @submit.prevent="discaj"  ref="data" > 
                    <div class="form-group" >
                     
                    </div>  
                 
                      <b-row>
                        <b-col>
                      <label>Nama</label>
                      <input type="text" class="form-control" id="Name" v-model="admission.name" 
                      disabled>
                     </b-col>
                        <b-col>
                      <label>RN</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="admission.reg_number" disabled>
                        <input type="text" class="form-control" id="ICnumber" v-model="form.reg_number" disabled hidden>
                  </b-col>
                    <b-col>
                      <label>Nombor K/P atau Passport</label>
                      <input type="text" class="form-control" id="ICnumber" v-model="admission.kp_passport" disabled >
                       <input type="text" class="form-control" id="ICnumber" v-model="form.kp_passport" disabled hidden>
                  </b-col>
                      </b-row>
                      <b-row>
                            <b-col>
                      <label>Tarikh Keluar Ward</label>
                      <input type="date" class="form-control" id="datedc" v-model="form.date_dc">
                         <small class="text-danger" v-if="errors.date_dc">{{errors.date_dc[0]}}</small>
                   </b-col>
                     <b-col>
                       <label>Masa Tinggal (Hari)</label>
                      <input type="number" class="form-control" id="duration" v-model="form.duration">
                         <small class="text-danger" v-if="errors.duration">{{errors.duration[0]}}</small>
                   </b-col>
                   <b-col>
                      <label>Jenis Discaj</label>
                        <select class="form-control" id="type dc" v-model="form.type_dc">                  
                        <option >Balik ke Rumah</option>
                        <option >Ditukar ke Hospital Lain</option>
                        <option >Mati</option>
                        <option >Keluar Hospital dengan Risiko Sendiri</option>
                        <option >Keluar Hospital Tanpa Kebenaran</option>
                        </select>
                    </b-col>
                  
                    </b-row>
                  <b-row>
                     <b-col>
                      <label>Diagnosis</label>
                      <input type="text" class="form-control" id="diagnosis" v-model="form.diagnosis">
                         <small class="text-danger" v-if="errors.diagnosis">{{errors.diagnosis[0]}}</small>
                   </b-col>
                  </b-row>
                      <b-row>
                     <b-col>
                      <label>Nota</label>
                      <textarea type="text" class="form-control" id="notes" v-model="form.notes"></textarea>
                   </b-col>
                 
                    </b-row>
               
                    <br>
                    <div class="form-group">
                      <button type="submit" id="myBtn" class="btn btn-primary btn-block" >Discaj</button>
               
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
       methods:{
         cases(){
      
    
        axios.get('/api/admissions/'+this.$route.params.id)
        .then(({data}) => (this.admission = data[0], this.form.reg_number = data[0].reg_number, this.form.kp_passport = data[0].kp_passport))
      },
           discaj(){
          axios.post('/api/discharge', this.form)
          .then(() => {
       
        Notification.success()
        this.$router.push({ path : '/pkrclist' });
         })
          .catch(error=> this.errors = error.response.data.errors)
          .catch(
            Toast.fire({
              icon: 'warning',
              title: 'Invalid data entry'
            })
          )
        }, 
       }, 
  

   
     mounted(){
     let roles = localStorage.getItem('roles');
      if(roles.includes("user")-1){
      this.$router.push({name: 'home'})
      Notification.unauthorized()
    }


      },

      
     data(){
      return{
        
        
          admission:[],
          form:{
           name:null,
           kp_passport:null,
           reg_number: null,
           date_dc:null ,
           duration: null,
           diagnosis: null,
           type_dc: null,
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
      
      }
 


    },
    mounted: function(){
      this.cases();
       
    }, 
   


  }
</script>


<style type="text/css">
  #em_photo{
    height: 40px;
    width: 40px;
  }
</style>