<style scoped>
  .headline {
    color: #7f8fa4;
  }

  .btn {
    box-sizing: content-box;

    background-color: #cfa367 !important;
  }

  .stakesbtn {
    right: 30px;
    bottom: 30px;
  }

  .generatebtn {
    right: 30px;
    top: 30px;
    text-transform: none;
  }

  .createbtn {
    right: 30px;
    top: 138px;
    text-transform: none;
  }

  .border-bottom {
    border-bottom: 1px solid #313d4f;
  }
  .tooltipContent{
    position: fixed;
    background-color: white;
    padding: 40px;
  }
</style>
<template>
  <!-- grid-list-xl  打开间距-->
  <v-container grid-list-xl text-xs-left>
    <v-layout row wrap fill-height>
      <v-flex d-flex xs6>

        <v-layout row wrap>
        <v-flex tag="h1" xs6 mb-0 class="headline">Testnet Situation</v-flex>
          <v-flex d-flex xs12>
        <v-card color="blue-grey darken-4" dark>
          <v-container class="px-4 py-4">
            <v-flex xs12 class="title blue-grey--text">
              <!-- <v-container class="px-4 py-4"> -->
                <v-layout row wrap justify-space-between>
              <v-flex xs6>
                Current Block Number<br><br><br>
                Irreversible Block Number<br><br><br>
                Head Block Time<br><br><br>
                Server Version
              </v-flex>
              <v-flex xs6>
                <p class="title ml-5" style="color: white">{{ baobao.head_block_num }}</p> <br>
                <p class="title ml-5" style="color: white">{{ baobao.last_irreversible_block_num }}</p> <br>
                <p class="title ml-5" style="color: white"> {{ baobao.head_block_time }}</p> <br>
                <p class="title ml-5" style="color: white"> {{ baobao.server_version }}</p>
            </v-flex>
            </v-layout>
          <!-- </v-container> -->

          </v-flex>
          </v-container>
        </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
      <v-flex d-flex xs6>
        <v-layout row wrap>
          <v-flex tag="h1" xs6  mb-0 class="headline">Your Stakes</v-flex>
          <v-flex d-flex xs12>
            <v-card color="blue-grey darken-4" dark>
              <v-container class="px-4 py-4">
                <v-layout row wrap>
                  <v-flex xs12 class="title  blue-grey--text border-bottom">
                    SYS
                  </v-flex>
                  <v-flex xs12 class="display-1">
                    {{ sysamt }}
                    <v-btn class="btn generatebtn" absolute dark mx-0 my-0
                           @click="setstakes">Set stakes
                    </v-btn>
                    <!--:disabled="!!(publicKey && privateKey)"-->
                  </v-flex>
                </v-layout>
              </v-container>
            </v-card>
          </v-flex>
        </v-layout>
      </v-flex>
    </v-layout>
    <v-flex tag="h1" xs12 mb-0 class="headline">Block Producers</v-flex>
    <!-- <v-flex d-flex v-for="item in lists">
      <v-flex xs6>
        <v-tooltip>
          <div slot="activator">{{ item.producer_name }}</div>
          <span>Tooltip</span>
        </v-tooltip>
      </v-flex>
      <v-flex xs6>
              <p class="text-xs-right">{{ item.organization_name }}</p>
              <v-btn small>Vote</v-btn>
      </v-flex>
    </v-flex> -->
    <!--<v-flex x12 class="blue-grey&#45;&#45;text">-->
      <!-- <v-data-table
              :items="desserts"
              hide-actions
              hide-headers
      >
        <template slot="items" slot-scope="props">
          <td>{{ props.item.name }}</td>
          <td class="text-xs-right">{{ props.item.calories }}</td> -->
          <v-data-table
                  :items="lists"
                  hide-actions
                  hide-headers
          >
            <template slot="items" slot-scope="props">
              <td>{{ props.item.producer_name }}
                <span @mouseover="showToolTip($event, props.item.producer_name)">ICON</span>
              </td>
              <v-icon slot="activator" dark color="primary">home</v-icon>
              <span>Tooltip</span>
              <!-- <td>{{ props.itemli.name}}</td> -->
              <!-- <td class="text-xs-right">{{ props.items.website }}</td> -->
    <!-- <v-tooltip> -->


    <!-- </v-tooltip> -->
          <td class="text-xs-right">{{ props.item.organization_name }}</td>

          <!--<td class="text-xs-right">{{ props.item.carbs }}</td>-->
          <!--<td class="text-xs-right">{{ props.item.protein }}</td>-->
          <!--<td class="text-xs-right">{{ props.item.iron }}</td>-->
          <v-btn small>Vote</v-btn>
        </template>
      </v-data-table>
    <!--</v-flex>-->
    <div class="tooltipContent" :style="{ top: tooltipContent.y + 'px', left: tooltipContent.x + 'px' }">
      test
    </div>
  </v-container>
</template>


<!--<section>-->
<!--<div class="columns">-->
<!--<div class="column is-one-quarter container is-fluid hero is-dark">-->
<!--<b>Testnet Status{{save}}</b>-->
<!--<div class="field">-->
<!--<div class="control" style="font-size: 12px">-->
<!--Current Block-->
<!--<input class="input is-primary" type="text" placeholder="Primary input" v-model="baobao.head_block_num">-->
<!--</div>-->
<!--</div>-->
<!--<div class="field">-->
<!--<div class="control" style="font-size: 12px">-->
<!--Irreversible Block-->
<!--<input class="input is-warning" type="text" placeholder="Warning input"-->
<!--v-model="baobao.last_irreversible_block_num">-->
<!--</div>-->
<!--</div>-->
<!--<div class="field">-->
<!--<div class="control" style="font-size: 12px">-->
<!--Produced By-->
<!--<input class="input is-info" type="text" placeholder="Info input" v-model="baobao.head_block_producer">-->
<!--</div>-->
<!--</div>-->
<!--<div class="field">-->
<!--<div class="control" style="font-size: 12px">-->
<!--Timestamp-->
<!--<input class="input is-danger" type="text" placeholder="Danger input" v-model="baobao.head_block_time">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

<!--<div class="column  hero is-dark">-->
<!--<div class="columns">-->
<!--<div class="column is-3">-->
<!--<p style="font-size:13px;  margin-top: 31px">Total Assets<br><br>-->
<!--Stake on CPU and Bandwidth<br><br>-->
<!--Remain Balance</p>-->
<!--</div>-->
<!--<div class="column is-3">-->
<!--<div class="control" style="padding-top: 30px">-->
<!--<input class="input is-danger" type="text">-->
<!--</div>-->
<!--<div class="control" style="padding-top: 10px">-->
<!--<input class="input is-danger" type="text">-->
<!--</div>-->
<!--<div class="control" style="padding-top: 10px">-->
<!--<input class="input is-danger" type="text">-->
<!--</div>-->
<!--</div>-->
<!--<div class="column is-1">-->

<!--</div>-->
<!--<div class="column is-4" style="padding-left:30px;padding-top: 100px">-->
<!--Amount To Refund-->
<!--<div class="control">-->
<!--<input class="input is-info" type="text">-->
<!--</div>-->
<!--</div>-->
<!--</div>-->


<!--<div class="columns">-->
<!--<div class="column is-6 fluid">-->
<!--<a class="button is-danger" style="">Stake</a>-->
<!--</div>-->
<!--<div class="column is-6 fluid">-->
<!--<a class="button is-warning">To Refund</a>-->
<!--<a class="button is-success">Refund History</a>-->
<!--</div>-->
<!--</div>-->
<!--<div class="columns">-->
<!--<div class="column is-1" style="font-size:12px;">Total Voted</div>-->
<!--<div class="column is-2">-->
<!--<div class="control">-->
<!--<input class="input is-info" type="text" width="8px">-->
<!--</div>-->
<!--</div>-->
<!--<div class="column is-1 " style="font-size:12px;">Votes Remain</div>-->
<!--<div class="column is-2">-->
<!--<div class="control">-->
<!--<input class="input is-info" type="text" width="8px">-->
<!--</div>-->
<!--</div>-->
<!--<div class="column is-3 ">-->
<!--<a class="button is-info">Confirm</a>-->
<!--</div>-->
<!--<div class="column is-3 ">-->
<!--<a class="button is-light">Cancel</a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--<table class="table">-->
<!--<thead>-->
<!--<tr>-->
<!--<th>Team</th>-->
<!--<th><abbr title="Played">No</abbr></th>-->
<!--<th><abbr title="Won"></abbr></th>-->
<!--<th><abbr title="Drawn">Total Votes Weight</abbr></th>-->
<!--<th><abbr title="Lost">My Votes Weight</abbr></th>-->
<!--<th><abbr title="Goals for">Vote</abbr></th>-->
<!--<th><abbr title="Goals against">Unvote</abbr></th>-->
<!--</tr>-->
<!--</thead>-->
<!--<tbody>-->
<!--<tr>-->
<!--<th><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester-->
<!--City</a>-->
<!--<strong>(C)</strong>-->
<!--</th>-->
<!--<td>{{this.baobao}}</td>-->
<!--<td>23</td>-->
<!--<td>12</td>-->
<!--<td>3</td>-->
<!--<td>68</td>-->
<!--<td>36</td>-->
<!--</tr>-->
<!--<tr class="is-selected">-->
<!--<th><a href="https://en.wikipedia.org/wiki/Manchester_City_F.C." title="Manchester City F.C.">Manchester-->
<!--City</a></th>-->
<!--<td>38</td>-->
<!--<td>19</td>-->
<!--<td>9</td>-->
<!--<td>10</td>-->
<!--<td>71</td>-->
<!--<td>41</td>-->
<!--</tr>-->
<!--</tbody>-->
<!--</table>-->
<!--<button @click="join">Join</button>-->
<!--<div class="modal">-->
<!--<div class="modal-background"></div>-->
<!--<div class="modal-card">-->
<!--<header class="modal-card-head">-->
<!--<p class="modal-card-title">Modal title</p>-->
<!--<button class="delete" aria-label="close"></button>-->
<!--</header>-->
<!--<section class="modal-card-body">-->
<!--&lt;!&ndash; Content ... &ndash;&gt;fds-->

<!--</section>-->
<!--<footer class="modal-card-foot">-->
<!--<button class="button is-success">Save changes</button>-->
<!--<button class="button">Cancel</button>-->
<!--</footer>-->
<!--</div>-->
<!--</div>-->
<!--</section>-->


<script>
  import axios from 'axios'

  export default {
    data () {
      return {
        baobao: {},
        headers: [{
          text: 'Dessert (100g serving)',
          align: 'left',
          sortable: false,
          value: 'name'
        }, {text: 'Calories', value: 'calories'}, {text: 'Fat (g)', value: 'fat'}, {
          text: 'Carbs (g)',
          value: 'carbs'
        }, {text: 'Protein (g)', value: 'protein'}, {text: 'Iron (%)', value: 'iron'}],
        desserts: [{
          value: false,
          name: 'Frozen Yogurt',
          calories: 159,
          fat: 6.0,
          carbs: 24,
          protein: 4.0,
          iron: '1%'
        }, {
          value: false,
          name: 'Ice cream sandwich',
          calories: 237,
          fat: 9.0,
          carbs: 37,
          protein: 4.3,
          iron: '1%'
        }, {
          value: false,
          name: 'Eclair',
          calories: 262,
          fat: 16.0,
          carbs: 23,
          protein: 6.0,
          iron: '7%'
        }, {
          value: false,
          name: 'Cupcake',
          calories: 305,
          fat: 3.7,
          carbs: 67,
          protein: 4.3,
          iron: '8%'
        }, {
          value: false,
          name: 'Gingerbread',
          calories: 356,
          fat: 16.0,
          carbs: 49,
          protein: 3.9,
          iron: '16%'
        }, {
          value: false,
          name: 'Jelly bean',
          calories: 375,
          fat: 0.0,
          carbs: 94,
          protein: 0.0,
          iron: '0%'
        }, {
          value: false,
          name: 'Lollipop',
          calories: 392,
          fat: 0.2,
          carbs: 98,
          protein: 0,
          iron: '2%'
        }, {
          value: false,
          name: 'Honeycomb',
          calories: 408,
          fat: 3.2,
          carbs: 87,
          protein: 6.5,
          iron: '45%'
        }, {
          value: false,
          name: 'Donut',
          calories: 452,
          fat: 25.0,
          carbs: 51,
          protein: 4.9,
          iron: '22%'
        }, {
          value: false,
          name: 'KitKat',
          calories: 518,
          fat: 26.0,
          carbs: 65,
          protein: 7,
          iron: '6%'
        }],
        sysamt: '0',
        lists: [],
        temp: [],
        tooltipContent: {x:0,y:0}
      }
    },
    mounted(){
      // axios.get('http://baby.eoshenzhen.io:8888/v1/chain/get_info')
      //   .then((response) => {
      //     this.baobao = response.data
      //     console.log(response.data)
      //     return this.baobao
      //   })
      //   .catch(function (error) {
      //     console.log(error)
      //   })
      console.log('mounted Working')
        axios.post('/getBPData', this.$data.list).then((response) => this.temp = this.lists = response.data)
        this.timer = setInterval(()=>{
            this.save()
        }, 1000)
        // 内存溢出，websocket出现，解决了轮训的性能问题，大量的轮训，三十，一个轮训，轮训管理释放内存，浏览器半小时崩溃，能否改
        // server端需要对接口进行特殊处理，前端：直接做websocket的API
        // 监控数据库，和接口发生改变的时候，法连
    },
    destroy(){
        window.clearInterval(this.timer)
    },
    methods: {
      showToolTip ($event, producer_name){
          console.log('$event', $event)
          let { top, left } = $event.target.getBoundingClientRect()
          this.tooltipContent.x = left
          this.tooltipContent.y = top
      },
      save () {
        axios.get('http://baby.eoshenzhen.io:8888/v1/chain/get_info'
      ).then((response) => {
            this.baobao = response.data
            // console.log(response.data)
            return this.baobao
          }, 1000)
          .catch(function (error) {
            console.log(error)
          })
      },
      setstakes () {

      },
      join () {
        // this.$router.push('/join')
        this.$router.push({name: 'join'})
        window.location.href = 'localhost:8080/#/join'
      }
    }
  }
</script>
