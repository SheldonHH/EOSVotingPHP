<template>
  <v-container grid-list-xl text-xs-left>
    <v-layout row wrap>
      <v-flex d-flex xs3>
        <v-card color="blue-grey darken-4" dark>
          <v-container class="px-4 py-4">
            <v-flex tag="h1" class="white--text display-1 my-0 px-0">Stakes</v-flex>
            <v-flex xs-12 class="caption px-0">Set your stake for both CPU and Network bandwidth before voting.</v-flex>
          </v-container>
        </v-card>
      </v-flex>

      <v-flex xs9>
        <v-flex xs12 px-0>
          <v-card color="blue-grey darken-4" dark>
            <v-flex tag="h1" my-0 class="headline" style="background-color: #000;">Overview</v-flex>
            <v-container class="px-4 py-4">
              <v-layout row wrap justify-space-between>
                <v-flex xs6>
                  <p class="display-1 mb-0">{{ activeNumber }} Stakes</p>
                  <p class="display-1 mb-0 blue-grey--text">{{ refundingNumber }} Refunding</p>
                </v-flex>
                <v-flex xs6 text-xs-right>
                  <p class="display-1 mb-0">100</p>
                  <p class="display-1 mb-0 blue-grey--text">Total SYS</p>
                </v-flex>
              </v-layout>
            </v-container>
          </v-card>
        </v-flex>

        <v-layout row wrap>
          <v-flex d-flex xs6>
            <v-card color="blue-grey darken-4" dark>
              <v-flex tag="h1" my-0 class="headline" style="background-color: #000;">Active</v-flex>
              <v-container text-xs-center pt-5>
                <v-progress-circular class="mt-5 progress-circular" :size="200" :width="15" :rotate="-90" :value="(1 - activeNumber / totalNumber) * 100" color="red">
                  {{ Math.round((1 - activeNumber / totalNumber) * 100) }} %
                </v-progress-circular>
                <v-flex xs-12 mt-5 class="caption px-0 pt-0">Set your stake for both CPU and Network bandwidth before voting.</v-flex>
                <v-flex tag="h1" class="display-1 white--text" my-0>{{ totalNumber - activeNumber }} SYS</v-flex>
              </v-container>
            </v-card>
          </v-flex>

          <v-flex xs6>
            <v-layout column>
              <v-flex tag="h1" my-0 class="headline">Stakes</v-flex>
              <v-card color="blue-grey darken-4" dark>
                <v-container text-xs-center>
                  <v-flex tag="h1" class="display-1 white--text" my-0>{{ stakesNumber }} SYS</v-flex>
                  <v-slider v-model="stakesNumber" step="1" min="0" :max="totalNumber"></v-slider>
                  <v-flex xs-12 class="caption px-0 pt-0">Set your stake for both CPU and Network bandwidth before voting.</v-flex>
                  <v-btn class="btn changebtn" dark mx-0 my-0 @click="change">Change</v-btn>
                </v-container>
              </v-card>
            </v-layout>

            <v-layout column>
              <v-flex tag="h1" my-0 class="headline">Refunding</v-flex>
              <v-card color="blue-grey darken-4" dark>
                <v-container text-xs-center>
                  <v-flex tag="h1" class="display-1 white--text" my-0>{{ refundingNumber }} SYS</v-flex>
                  <v-progress-linear :value="(refundingNumber / totalNumber) * 100" height="5" color="info"></v-progress-linear>
                  <v-flex xs-12 class="caption px-0">You will be refunded after 72 hours each time your stakes are reduced.</v-flex>
                </v-container>
              </v-card>
            </v-layout>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>
  export default {
    name: 'stakes',

    methods: {
      change () {
        // Stakes

        // After modifying the request result
        // this.activeNumber = 0
        // this.stakesNumber = 0
        // this.refundingNumber = 0
      }
    },

    created () {
      // Initialization
      this.activeNumber = 0
      this.stakesNumber = 0
      this.refundingNumber = 0
      this.totalNumber = 100
    },

    data () {
      return {
        activeNumber: 0,
        stakesNumber: 0,
        refundingNumber: 0,
        totalNumber: 100
      }
    }
  }
</script>

<style scoped>
  .headline {
    color: #7f8fa4;
  }

  .btn {
    box-sizing: content-box;

    background-color: #cfa367!important;
  }

  .changebtn {
    text-transform: none;
  }

  .progress-circular {
    color: #cfa367!important;
  }
</style>
