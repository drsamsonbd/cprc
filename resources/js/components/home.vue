<template>
<div>
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>
  <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Bilangan pesakit Aktif</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{{sum.active}}</div>
                     
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-head-side-cough text-primary" ></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Annual) Card Example
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Sales</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">650</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                        <span>Since last years</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-success"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!-- New User Card Example 
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">New User</div>
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">366</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                        <span>Since last month</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-info"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <!-- Pending Requests Card Example
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-uppercase mb-1">Pending Requests</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                      <div class="mt-2 mb-0 text-muted text-xs">
                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                        <span>Since yesterday</span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-warning"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            
</div>

    <div
      class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-33"
    >
      <chart-card
        :chart-data="emailsSubscriptionChart.data"
        :chart-options="emailsSubscriptionChart.options"
        :chart-responsive-options="emailsSubscriptionChart.responsiveOptions"
        chart-type="Bar"
        chart-inside-header
        background-color="rose"
      >
        <md-icon slot="fixed-button">build</md-icon>
        <md-button class="md-simple md-info md-just-icon" slot="first-button">
          <md-icon>refresh</md-icon>
          <md-tooltip md-direction="bottom">Refresh</md-tooltip>
        </md-button>
        <md-button class="md-simple md-just-icon" slot="second-button">
          <md-icon>edit</md-icon>
          <md-tooltip md-direction="bottom">Change Date</md-tooltip>
        </md-button>

        <template slot="content">
          <h4 class="title">Website Views</h4>
          <p class="category">
            Last Campaign Performance
          </p>
        </template>

        <template slot="footer">
          <div class="stats">
            <md-icon>access_time</md-icon>
            updated 10 days ago
          </div>
        </template>
      </chart-card>
    </div>
  <!--viewModal-->
  <div>
  <b-modal ref="view-modal" size="xl" hide-footer title="Data Harian PKRC">     
          <form class="patient" > 
                    <div class="form-group" hidden>
                      <label>User ID:</label>
                      <input type="hidden" class="form-control" id="exampleInputID" placeholder="ID" v-model="views.id">
                     
                    </div>  
                 
                                         <b-row>
                        <b-col>
                      <label>Tarikh</label>
                      <input type="date" class="form-control" id="date" v-model="views.date" disabled>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>
                     <b-col>
                         <label>Masa</label>
                      <input type="time" class="form-control" id="time" v-model="views.time" disabled>
                     <small class="text-danger" v-if="errors.date">{{errors.date[0]}}</small>
                     </b-col>

                           <b-col>
                      <label>PKRC</label>
                      <input class="form-control" id="pkrc" v-model="views.pkrc" disabled>                      
                   </b-col>
                     </b-row>
                           <br>  
                    <b-row>
                      <h5>Pesakit Dewasa</h5>
                      <b-col>
                      <label>Lelaki</label>
                      <input type="number" class="form-control" id="male" v-model="views.male" disabled>
                       
                  </b-col>
                   <b-col>
                    <label>Perempuan</label>
                      <input type="number" class="form-control" id="female" v-model="views.female" disabled>
                 
                  </b-col>                
                    </b-row>
                  <br>
                   <b-row>
                      <h5>Pesakit Kanak-kanak</h5>
                      <b-col>
                      <label>Lelaki</label>
                      <input type="number" class="form-control" id="pmale" v-model="views.paeds_male" disabled>
             
                  </b-col>
                   <b-col>
                    <label>Perempuan</label>
                      <input type="number" class="form-control" id="pfemale" v-model="views.paeds_female" disabled>
                     
                  </b-col>                
                    </b-row>
                    <br>
  
                               <b-row>
                                  <h5>Staging</h5>
                       <b-col>
                      <label>Stage 1</label>
                      <input type="number" class="form-control" id="s1" v-model="views.stage_1" disabled>
                      
                  </b-col>
                   <b-col>
                    <label>Stage 2</label>
                      <input type="number" class="form-control" id="s2" v-model="views.stage_2" disabled>
                      
                  </b-col>                
                    </b-row>
                    <br>
                        
                  <b-row>
                       <b-col>
                      <label>Jumlah Warganegara</label>
                      <input type="number" class="form-control" id="local" v-model="views.local" disabled>
                         
                  </b-col>
                   <b-col>
                    <label>Jumlah BWN</label>
                      <input type="number" class="form-control" id="non_local" v-model="views.non_local" disabled>
                         <small class="text-danger" v-if="errors.non_local">{{errors.non_local[0]}}</small>
                  </b-col>     
                       <b-col>
                    <label>BOR</label>
                      <input type="text" class="form-control" id="bor" v-model="views.bor" disabled>
                      
                  </b-col>            
                    </b-row>
                    <br>
                   <b-row>
                       <b-col>
                      <label>Bilangan Penjaga</label>
                      <input type="number" class="form-control" id="carer" v-model="views.carer" disabled>
                         <small class="text-danger" v-if="errors.carer">{{errors.carer[0]}}</small>
                  </b-col>
                   <b-col>
                    <label>Bilangan Staf</label>
                      <input type="number" class="form-control" id="staff" v-model="views.staff" disabled>
                         <small class="text-danger" v-if="errors.staff">{{errors.staff[0]}}</small>
                  </b-col>                
                   </b-row>
              
                    <div class="form-group">
                      <label>Nota</label>
                      <textarea input type="text" class="form-control" id="notes" v-model="views.notes" disabled></textarea>
                         <small class="text-danger" v-if="errors.notes">{{errors.notes[0]}}</small>
                    </div>
                    
                    <hr>
                 
                  </form> 
   </b-modal>
  
   </div>  
<!--viewModal-->



   <div class="row">
            <div class="col-lg-12 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Laporan Harian PKRC</h6>
                </div>


<b-row>
  
        <b-col sm="6" class="my-1">
        <b-form-group
          label=""
          label-for="filter-input"
          label-cols-sm="3"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-input-group size="sm">
            <b-form-input
              id="filter-input"
              v-model="filter"
              type="search"
              placeholder="Carian"
            ></b-form-input>

            <b-input-group-append>
              <b-button variant="outline-secondary" :disabled="!filter" @click="filter = ''">Clear</b-button>
            </b-input-group-append>
          </b-input-group>
        </b-form-group>
      </b-col>

      <b-col sm="4"  class="my-1">
        <b-form-group
          label=""
          label-for="per-page-select"
          label-cols-sm="6"
          label-align-sm="right"
          label-size="sm"
          class="mb-0"
        >
          <b-form-select
            id="per-page-select"
             v-model="perPage"
            :options="pageOptions"
            size="sm"
          ></b-form-select>
        </b-form-group>
      </b-col>

   
    </b-row>

      <b-table  responsive 
      :items="items"
      :fields="fields"
      :current-page="currentPage"
      :per-page="perPage"
      :filter="filter"
      :filter-included-fields="filterOn"
      :sort-by.sync="sortBy"
      :sort-desc.sync="sortDesc"
      :sort-direction="sortDirection"
      stacked="md"
      show-empty
      small
     
      flex 
      striped 
      hover
      @row-clicked="viewModal"
    >
     <template #cell(index)="data">
        {{ data.index + 1 }}
      </template>
      <template #cell(item)="row">
        {{ row.value.name }} {{ row.value.icno }} {{ row.value.email }} {{ row.value.roles}}
      </template>

      <template #cell(actions)="row">
        <b-button size="sm" id="toggle-btn"  @click="toggleModal(row.item.id)" class="mr-1">
         <i class="fas fa-user-edit"></i>
        </b-button>
        <b-button size="sm" class="btn btn-sm btn-danger" @click="deleteUser(row.item.id)">
         <i class="fas fa-user-times"></i>
        </b-button>
      </template>

      <template #row-details="row">
        <b-card>
          <ul>
            <li v-for="(value, key) in row.item" :key="key">{{ key }}: {{ value }}</li>
          </ul>
        </b-card>
      </template>
    </b-table>
               
                       

                    
                </div>
               <div class="card-footer">
                   <p class="mt-3"  align="center">Current Page: {{ currentPage }}</p>
                      <b-pagination  align="center"
                      v-model="currentPage"
                      :total-rows="rows"
                      :per-page="perPage"
                      
                       last-number
                      aria-controls="my-table"
                    ></b-pagination>
                </div>
              </div>
            </div>
     
          <!--Row-->

   </div> 
</template>

<script type="text/javascript">
export default{
  created(){
    if(!User.loggedIn()){
      this.$router.push({name:'/'})
    }
  },

     mounted(){
     let roles = localStorage.getItem('roles');
      if(roles.includes("user")-1){
      this.$router.push({name: 'home'})
      Notification.unauthorized()
    }
 

        this.allPatient();
        
      this.renderChart(this. emailsSubscriptionChart, this.options, this.responsiveOptions);
    
     
      },

      
     data(){
      return{
          views:[], 
        sum:[],
        errors:{},     
        
        itemize: [
          {
            text: 'Dashboard',
            href: '/'
          },
          {
            text: 'Laporan',
            active: true
          },
        ],
          modalShow: false,

        perPage: 20,
        currentPage: 1,
        pageOptions: [5, 10, 15, 25, { value: 100, text: "Show a lot" }],
     sortBy: 'time',
        sortDesc: true,
        sortDirection: 'desc',
        filter: null,
        filterOn: [],
        items: [],
        fields: [
          { key: 'date', label: 'Tarikh', sortable: true, sortDirection: 'asc' },
          { key: 'time', label: 'Masa', sortable: true, sortDirection: 'asc' },
          { key: 'pkrc', label: 'PKRC', sortable: true, sortDirection: 'desc' },
          { key: 'male', label: 'Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'female', label: 'Perempuan', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_male', label: 'Kanak-kanak Lelaki', sortable: true, sortDirection: 'desc' },
          { key: 'paeds_female', label: 'Kanak-kanak Perempuan', sortable: true, sortDirection: 'desc' },
          { key: 'carer', label: 'Penjaga', sortable: true, sortDirection: 'desc' },
          { key: 'local', label: 'Warganegara', sortable: true, sortDirection: 'desc' },
          { key: 'non_local', label: 'BWN', sortable: true, sortDirection: 'desc' },           
    

        ],
        table:'',
      }
 





    },   



        emailsSubscriptionChart: {
        data: {
          labels: [
            "Ja",
            "Fe",
            "Ma",
            "Ap",
            "Mai",
            "Ju",
            "Jul",
            "Au",
            "Se",
            "Oc",
            "No",
            "De"
          ],
          series: [[542, 443, 320, 780, 553, 453, 326, 434, 568, 610, 756, 895]]
        },
        options: {
          axisX: {
            showGrid: false
          },
          low: 0,
          high: 1000,
          chartPadding: {
            top: 0,
            right: 5,
            bottom: 0,
            left: 0
          }
        },
        responsiveOptions: [
          [
            "screen and (max-width: 640px)",
            {
              seriesBarDistance: 5,
              axisX: {
                labelInterpolationFnc: function(value) {
                  return value[0];
                }
              }
            }
          ]
        ]
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
     axios.get('/api/reports/')
      .then(function (response) {
        self.items = response.data;
      }).catch(function (error) {
        console.log(error);
        self.$router.push({ path: '/login' });
      });
    },
         sum(){
    let self = this;
     axios.get('/api/sum/1')
      .then(function (response) {
        self.sum = response.data;
      })
         },

       toggleModal(id) {
         axios.get('/api/reports/'+id)
  	    .then(({data}) => (this.forms = data))
        this.$refs['edit-modal'].toggle('#toggle-btn')
       
      },
    

         viewModal(record) {
          let self = this;
            axios.get('/api/reports/'+record.id)
  	     .then(function (response) {
        self.views = response.data;
        })
        this.$refs['view-modal'].toggle('#toggle-btn')
   
  },
  }
}
  



</script>

<style type="text/css">

</style>