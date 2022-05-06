<template>
    <div class="container full-bg h-full w-full max-w-full">
        <div class="fixed-size-container mx-auto px-5 sm:px-20 md:px-0">
            <img src="/sgt-logo.svg" alt="SGT Logo" class="mx-auto mb-24 w-52 pt-6">

            <div class="quote-box container bg-white shadow-3xl rounded-md py-10 px-6 sm:px-12 mx-auto lg:w-7/12 md:w-7/12">
            <h1 class="font-heading font-extrabold text-2xl sm:text-3xl text-center leading-7 mb-10">Get a Free<br>
            <span class="text-red-500">Instant Quote</span></h1>
                <form autocomplete="off" @submit.prevent="saveQuote">
                    <div class="group">
                        <label for="from" class="block font-body font-bold text-xs text-zinc-800 uppercase">Ship from</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input v-model="from" type="text" name="from" required id="from" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full text-base font-body border-[#e2e2ef] border-2 rounded-md py-3 px-4 placeholder:italic placeholder:font-normal font-bold" placeholder="ZIP Code or City" autocomplete="off" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <FlagIcon class="h-5 w-5 text-sgt-purple" aria-hidden="true" />
                        </div>
                        </div>
                    </div>     

                    <div class="group mt-6">
                        <label for="to" class="block font-body font-bold text-xs text-zinc-800 uppercase">Deliver to</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                        <input v-model="to" type="text" name="to" required id="to" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full text-base font-body border-[#e2e2ef] border-2 rounded-md py-3 px-4 placeholder:italic placeholder:font-normal font-bold" placeholder="ZIP Code or City" autocomplete="off" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <LocationMarkerIcon class="h-5 w-5 text-sgt-purple" aria-hidden="true" />
                        </div>
                        </div>
                    </div>  

<div class="group mt-6">
    <label class="block font-body font-bold text-xs text-zinc-800 uppercase">Transport method</label>
    <fieldset class="mt-4">
      <legend class="sr-only">Transport method</legend>
      <div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
        <div class="flex items-center cursor-pointer">
          <input v-model="method" id="open" name="method" type="radio" value="0" class="cursor-pointer h-6 w-6 text-sgt-purple border-2 border-gray-300" />
          <label for="open" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
            Open
          </label>
        </div>
        <div class="flex items-center cursor-pointer">
          <input v-model="method" id="enclosed" name="method" type="radio" value="1" class="cursor-pointer h-6 w-6 text-sgt-purple border-2 border-gray-300" />
          <label for="enclosed" class="ml-3 block text-sm font-medium text-gray-700 cursor-pointer">
            Enclosed
          </label>
        </div>
      </div>
    </fieldset>
    </div>

                    <div>
            <button type="submit" class="btn-red w-full flex justify-center mt-5 py-3 px-4 border border-transparent rounded-md shadow-sm text-lg font-bold font-heading text-white uppercase bg-red-500 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Get quote</button>
          </div>                                
                </form>

   <div class="rounded-md bg-green-50 p-4 mt-5" v-show="message">
    <div class="flex">
      <div class="flex-shrink-0">
        <CheckCircleIcon class="h-5 w-5 text-green-400" aria-hidden="true" />
      </div>
      <div class="ml-3">
        <h3 id="success" class="text-sm font-medium text-green-800">{{message}}</h3>
      </div>
    </div>
  </div>

            </div>  
        </div>
    </div>
</template>

<script>
import { FlagIcon, LocationMarkerIcon, CheckCircleIcon } from '@heroicons/vue/solid'

export default {
  data() {
    return {
        from: '',
        to: '',
        method: 0,
        message: null,
    }
  },
  methods: {
    saveQuote() {
        axios.post('/quotes',{from: this.from, to: this.to, method: this.method})
        .then((response)=>{
            this.message = response.data.message;
        })
    },
  },    
  components: {
    FlagIcon,
    LocationMarkerIcon,
    CheckCircleIcon
  },
}
</script>

<style scoped>
.full-bg {
    background-image: url("/quote-bg.jpg");
    background-size: cover;
    background-position: center;
}

@media (min-width: 640px) {
.fixed-size-container {
    width: 640px;
}
}

@media (min-width: 768px) {
.fixed-size-container {
    width: 768px;
}
}

@media (min-width: 1024px) {
.fixed-size-container {
    width: 930px;
}
}

.btn-red,.btn-white{font-size:18px;padding:0 1.3em;height:52px;line-height:52px;min-width:220px;border-radius:4px;font-family:Raleway,sans-serif;font-weight:700;transition:all .1s ease-in-out}

@media only screen and (min-width:768px){.btn-red,.btn-white{font-size:20px}}

.btn-blue{height:52px;padding:0 20px;line-height:52px;border-radius:4px;background-color:#252cbe;color:#fff;margin-bottom:5px}

.btn-blue:hover{box-shadow:0 0 6px rgba(37,44,190,.64);color:#fff!important}

.btn-red{background-color:#fb3d37;color:#fff;position:relative;border:none;z-index:1;top:0}

.btn-red:after,.btn-red:before{transition:all .2s;opacity:0;content:"";display:block;z-index:-1}

.btn-red:before{width:80%;height:30px;background:#ff6249;position:absolute;left:10%;top:100%;-webkit-filter:blur(10px);filter:blur(10px);margin-top:-36px;-webkit-transform:translateY(0);transform:translateY(0)}

.btn-red:after{width:100%;position:absolute;height:100%;border-radius:4px;left:0;top:0;background:linear-gradient(90deg,#fb3d37 24%,#ff7751 47%,#ff7751 53%,#fb3d37 76%);-webkit-animation:repeatableGradient 2s linear infinite;animation:repeatableGradient 2s linear infinite;background-size:200% 100%;-webkit-animation-play-state:paused;animation-play-state:paused}

.btn-red.active-state,.btn-red.active-state2,.btn-red:hover{color:#fff;background-color:#ff6249;top:-2px}

.btn-red.active-state2:before,.btn-red.active-state:before,.btn-red:hover:before{opacity:.6;-webkit-transform:translateY(10px);transform:translateY(10px)}

.btn-red.active-state2:after,.btn-red.active-state:after,.btn-red:hover:after{opacity:1;-webkit-animation-play-state:running;animation-play-state:running}

.btn-red.active-state2:before{-webkit-transform:translateY(0);transform:translateY(0);opacity:0}

.btn-red.active-state2:hover:before{opacity:.6;-webkit-transform:translateY(10px);transform:translateY(10px)}

.btn-red.active-state{top:0!important}

.btn-red.active-state:hover{top:-2px!important}

@-webkit-keyframes repeatableGradient{0%{background-position:200% 0}to{background-position:0 0}}

@keyframes repeatableGradient{0%{background-position:200% 0}to{background-position:0 0}}

</style>