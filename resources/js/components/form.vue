<template>
  <div class="card p-4">
    <thank-you v-if="current_step===3"></thank-you>

    <div class="card-header">
      <div v-if="current_step!==3">
      <small class="header-sm">Seller Application</small>
      <small class="pull-right header-sm">Step {{ current_step }} of 2</small>
      </div>
    </div>

    <div class="card-body">
    <div v-if="current_step==1">
      <div class="header">Share your work with us</div>
      <div class="sub-header">To ensure the quality of our marketplace, we limit our seller community to the most qualified creators. Let our curators know why you would be a great seller.</div>
    </div>
    <div v-if="current_step==2">
      <div class="header">Tell us about yourself</div>
      <div class="sub-header">Your answers will help us provide you with a more personalized experience as a seller.</div>
    </div>

    <b-form ref="form" @submit.stop.prevent="handleSubmit" class="steps">
     <div v-if="current_step==1" class="row step-1">
      <div class="col-6">
        <b-form-group
            label="First Name"
            label-for="first-input"
            invalid-feedback="First name is required"
            :state="firstState">
          <b-form-input
              id="first-input"
              v-model="first"
              :state="firstState"
              required
          ></b-form-input>
        </b-form-group>
      </div>
       <div class="col-6">
        <b-form-group
            label="Last Name"
            label-for="last-input"
            invalid-feedback="Last name is required"
            :state="lastState">
          <b-form-input
              id="last-input"
              v-model="last"
              :state="lastState"
              required
          ></b-form-input>
        </b-form-group>
      </div>
       <div class="col-12">
         <b-form-group
           label="Your Shop Category"
           label-for="category-input"
           invalid-feedback="Category is required"
           :state="categoryState">
         <b-form-select v-model="category" :options="categoryOptions"  id="category-input"></b-form-select>
       </b-form-group>
       </div>
       <div class="col-12">
         <b-form-group
             label="Portfolio Link"
             label-for="portfolio-input"
             invalid-feedback="Portfolio Link is required"
             :state="portfolioState">
           <b-form-input
               id="portfolio-input"
               v-model="portfolio"
               :state="portfolioState"
               required
           ></b-form-input>
         </b-form-group>
         <b-form-group
             label-for="checkbox"
             invalid-feedback="Confirmation is required"
             :state="checkboxState" v-if="portfolio">
         <b-form-checkbox
             id="checkbox"
             v-model="confirmed"
             name="checkbox-1"
             value="1"
             unchecked-value="0"
             :state="checkboxState"
             required>
           Yes, I confirm that the content submitted is authored by me.
         </b-form-checkbox>
         </b-form-group>
         <b-form-group label="Do you already have an online store?" v-slot="{ ariaDescribedby }" :state="radioState" required  invalid-feedback="This field is required">
           <b-form-radio v-model="radio" :aria-describedby="ariaDescribedby" name="radio" value="Yes"  required>Yes</b-form-radio>
           <b-form-radio v-model="radio" :aria-describedby="ariaDescribedby" name="radio" value="No"  required>No</b-form-radio>
         </b-form-group>
         <b-form-group label="Online stores I sell on today" v-if="radio==='Yes'">
             <b-form-textarea
               id="textarea"
               v-model="store"
               placeholder="Enter urls..."
               rows="3"
               max-rows="6"
           ></b-form-textarea>
         </b-form-group>
       </div>
     </div>
      <div v-else-if="current_step===2" class="row step-2">
        <div class="col-12">
          <b-form-group
              label="When creating products to sell, which best describes your perspective on quality?"
              label-for="quality-input"
              invalid-feedback="This answer is required"
              :state="qualityState">
            <b-form-select v-model="quality" :options="qualityOptions"  id="quality-input"></b-form-select>
          </b-form-group>
        </div>
        <div class="col-12">
          <b-form-group
              label="How would you describe your experience as an online seller?"
              label-for="experience-input"
              invalid-feedback="This answer is required"
              :state="experienceState">
            <b-form-select v-model="experience" :options="experienceOptions"  id="experience-input"></b-form-select>
          </b-form-group>
        </div>
        <div class="col-12">
          <b-form-group
              label="How would you describe your understanding of business and marketing?"
              label-for="business-input"
              invalid-feedback="This answer is required"
              :state="businessState">
            <b-form-select v-model="business" :options="businessOptions"  id="business-input"></b-form-select>
          </b-form-group>
        </div>


      </div>
    </b-form>
  </div>
    <div class="card-footer" v-if="current_step===1" >
      <b-button  class="float-right next" variant="success" @click="onClickNext">Next</b-button>
    </div>
    <div class="card-footer" v-if="current_step===2" >
      <b-button class="float-right submit" variant="success" @click="submitApplication" v-if="current_step===2">Submit Application</b-button>
      <b-button  class="float-left back" @click="onClickBack"><b-icon-chevron-left></b-icon-chevron-left> Back</b-button>
    </div>

  </div>
</template>

<script>
import ThankYou from './thank-you'

export default {
  data(){
    return {
      current_step:1,
      firstState: null,
      lastState: null,
      portfolioState:null,
      categoryState:null,
      checkboxState:null,
      qualityState:null,
      experienceState: null,
      businessState:null,
      radioState:null,
      first: '',
      last: '',
      portfolio:'',
      category: null,
      quality: null,
      experience: null,
      business: null,
      store:'',
      radio:null,
      confirmed: false,
      completed: false,
      businessOptions:[
        { value: null, text: 'Select Answer' },
        { value: '4', text: 'I have an extensive background in business and/or marketing'},
        { value: '3', text: 'I\'m familiar with some skills and some techniques, but I am not sure how to apply them when selling my creative work'},
        { value: '2', text: 'I\'m vaguely aware of basic business & marketing concepts'},
        { value: '1', text: 'I\'m  not interested in understanding business & marketing'}
      ],
      experienceOptions:[
        { value: null, text: 'Select Answer' },
        { value: '5', text: 'I sell on multiple marketplaces and through my own website'},
        { value: '4', text: 'I have experience selling only on my own website'},
        { value: '3', text: 'I have experience selling through multiple marketplaces'},
        { value: '2', text: 'I have experience selling through one online marketplace'},
        { value: '1', text: 'I am new to selling creative products online'}
      ],
      qualityOptions: [
        { value: null, text: 'Select Answer' },
        { value: '5', text: 'I don\'t care what it takes, my products are the highest quality possible'},
        { value: '4', text: 'I put in enough effort to make my product pretty high quality, but at some point my time is better spent elsewhere'},
        { value: '3', text: 'I try to get quality products out quickly, even if I need to take a shortcut now and then'},
        { value: '2', text: 'I spend minimal time & effort it takes to create products that are acceptable quality'},
        { value: '1', text: 'Quantity is more important to me than quality'}
      ],
      categoryOptions: [
        { value: null, text: 'Select Category' },
        { value: 'graphics', text: 'Graphics' },
        { value: 'fonts', text: 'Fonts' },
        { value: 'templates', text: 'Templates' },
        { value: 'add-ons', text: 'Add-ons' },
        { value: 'photos', text: 'Photos' },
        { value: 'web themes', text: 'Web themes' },
        { value: '3d', text: '3D' },
      ],
      submittedData: [],
    }
  },
  mounted() {
    this.prepareComponent();
  },
  computed: {
    checkValidity() {

    },
    step1Validity() {
      let valid = 0
      if (this.first&&this.last&&this.portfolio &&this.category&&this.radio&&this.confirmed) {
        valid = true
      } else {
        this.first?this.firstState=true:this.firstState=false
        this.last?this.lastState=true:this.lastState=false
        this.category?this.categoryState=true:this.categoryState=false
        this.portfolio?this.portfolioState=true:this.portfolioState=false
        this.radio?this.radioState=true:this.radioState=false
        this.confirmed?this.checkboxState=true:this.checkboxState=false
        valid = false;
      }
      return valid;
    },
    step2Validity() {
      let valid = 0
      if(this.quality&&this.experience&&this.business) {
        valid=true
      } else {
        this.quality?this.qualityState=true:this.qualityState=false
        this.experience?this.experienceState=true:this.experienceState=false
        this.business?this.businessState=true:this.businessState=false
        valid=false
      }
      return valid;
    }
  },
  components: {
    'thank-you': ThankYou,
  },
  methods: {
    prepareComponent() {
      this.current_step = 1;
    },
    checkStep1Validity() {
      return this.step1Validity
    },
    checkStep2Validity() {
      return this.step2Validity
    },
    checkFormValidity() {
      return this.step1Validity && this.step2Validity
    },
    handleSubmit() {
      // Exit when the form isn't valid
    },
    onClickNext: function() {
      if ( this.current_step == 1)
        if (!this.checkStep1Validity()) {
          return
        }
      if (this.current_step == 2)
        if (!this.checkStep2Validity()) {
          return
        }
      this.current_step++;
    },
    onClickBack: function() {
      this.current_step--;
    },
    submitApplication : function () {
      // Exit when the form isn't valid
      if (!this.checkFormValidity()) {
        return
      }

      let sendData = {
        first: this.first,
        last: this.last,
        portfolio: this.portfolio,
        has_store: this.radio==='Yes',
        store_url: this.store,
        category: this.category,
        quality_level: this.quality,
        experience_level: this.experience,
        business_level: this.business,
      }
      // Push the name to submitted names
      axios.post('/sellers', sendData).then(r=> {})
      // this.submittedData.push(sendData)

      // Hide the modal manually
      this.$nextTick(() => {
        this.current_step++;
        // this.$bvModal.hide('modal-1')
      })
      // Bus.$emit('updates', sendData)
    }
  }
}
</script>

<style scoped>
  label {font-weight: bold}
  .next, .submit {
    background:teal!important;
    border-color: teal;
    padding: .5rem 4rem;
  }
  .back {
    background:#fff!important;
    color:teal!important;
    border: none;
    padding-left: 0!important;
  }
  .steps {
    padding-top: 1rem ;
  }
</style>