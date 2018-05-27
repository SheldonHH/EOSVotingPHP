<template>
  <v-app dark class="black">
    <!--<v-toolbar>-->
      <!--<v-toolbar-side-icon></v-toolbar-side-icon>-->
      <!--<v-toolbar-title>Title</v-toolbar-title>-->
      <!--<v-spacer></v-spacer>-->
      <!--<v-toolbar-items class="hidden-sm-and-down">-->
        <!--<v-btn flat>Link One</v-btn>-->
        <!--<v-btn flat>Link Two</v-btn>-->
        <!--<v-btn flat>Link Three</v-btn>-->
      <!--</v-toolbar-items>-->
    <!--</v-toolbar>-->
      <v-toolbar>
        <p class="level-item has-text-centered">
          <!--<a >Home</a>-->
          <v-btn flat to="/home">Home</v-btn>
        </p>
        <p class="level-item has-text-centered">
          <v-btn flat to="/account">Import Account</v-btn>
        </p>
        <p class="level-item has-text-centered">
          <v-btn flat to="/createaccount">Create Account</v-btn>
        </p>
        <p class="level-item has-text-centered">
          <v-btn flat to="/vote">Voting</v-btn>
        </p>
        <p class="level-item has-text-centered">
          <v-btn flat to="/stakes">Stakes</v-btn>
        </p>
        <p class="level-item has-text-centered">
          <v-btn flat to="/settings">Settings</v-btn>
        </p>
      </v-toolbar>
    <v-content>
      <v-container grid-list-md text-xs-center>
        <router-view></router-view>
      </v-container>
    </v-content>
    <v-footer class="pa-3">
      <v-spacer></v-spacer>
      <div style="text-align: center">Copyright &copy; {{ new Date().getFullYear() }}EOS.host | All rights reserved.</div>
    </v-footer>
  </v-app>
  <!--<v-app dark class="blue-grey darken-3">-->
  <!--<v-navigation-drawer-->
  <!--fixed-->
  <!--:clipped="$vuetify.breakpoint.width > 1264"-->
  <!--v-model="drawer"-->
  <!--class="grey darken-3"-->
  <!--app-->
  <!--&gt;-->
  <!--<v-list dense class="grey darken-3">-->
  <!--<v-btn flat tag="v-list-tile" to="/vote">-->
  <!--<v-list-tile-action>-->
  <!--<v-icon>Vote</v-icon>-->
  <!--</v-list-tile-action>-->
  <!--<v-list-tile-content>-->
  <!--<v-list-tile-title class="white&#45;&#45;text">-->
  <!--Vote-->
  <!--</v-list-tile-title>-->
  <!--</v-list-tile-content>-->
  <!--</v-btn>-->
  <!--<v-btn flat tag="v-list-tile" to="/home">-->
  <!--<v-list-tile-action>-->
  <!--<v-icon>home</v-icon>-->
  <!--</v-list-tile-action>-->
  <!--<v-list-tile-content>-->
  <!--<v-list-tile-title class="white&#45;&#45;text">-->
  <!--Home-->
  <!--</v-list-tile-title>-->
  <!--</v-list-tile-content>-->
  <!--</v-btn>-->
  <!--<v-btn flat tag="v-list-tile" to="/settings">-->
  <!--<v-list-tile-action>-->
  <!--<v-icon>settings</v-icon>-->
  <!--</v-list-tile-action>-->
  <!--<v-list-tile-content>-->
  <!--<v-list-tile-title class="white&#45;&#45;text">-->
  <!--Settings-->
  <!--</v-list-tile-title>-->
  <!--</v-list-tile-content>-->
  <!--</v-btn>-->

  <!--<v-btn flat tag="v-list-tile" to="/account">-->
  <!--<v-list-tile-action>-->
  <!--<v-icon>person</v-icon>-->
  <!--</v-list-tile-action>-->
  <!--<v-list-tile-content>-->
  <!--<v-list-tile-title class="white&#45;&#45;text">-->
  <!--Account <span v-if="getAccount && getAccount.name">({{getAccount.name}})</span>-->
  <!--</v-list-tile-title>-->
  <!--</v-list-tile-content>-->
  <!--</v-btn>-->
  <!--<v-btn flat tag="v-list-tile" to="/matches">-->
  <!--<v-list-tile-action>-->
  <!--<v-icon>view_list</v-icon>-->
  <!--</v-list-tile-action>-->
  <!--<v-list-tile-content>-->
  <!--<v-list-tile-title class="white&#45;&#45;text">-->
  <!--Matches-->
  <!--</v-list-tile-title>-->
  <!--</v-list-tile-content>-->
  <!--</v-btn>-->
  <!--</v-list>-->
  <!--</v-navigation-drawer>-->
  <!--<v-toolbar color="blue-grey darken-4" app absolute clipped-left>-->
  <!--<v-toolbar-side-icon v-if="$vuetify.breakpoint.width <= 1264" @click="drawer = !drawer"></v-toolbar-side-icon>-->
  <!--<span class="title">EOS<span class="text">Chess</span> <span class="caption">TESTNET2</span>-->
  <!--<v-tooltip bottom>-->

  <!--<span v-show="dotVisible" v-bind:style="{ color: 'green'}" slot="activator" v-if="getEndpointConnectionStatus === 0">⚫</span>-->
  <!--<span slot="activator" v-else style="color:red;">⚫</span>-->
  <!--<span v-if="getEndpointConnectionStatus === 0">Connection status: GOOD</span>-->
  <!--<span v-else>Connection status: BAD</span>-->

  <!--</v-tooltip>-->
  <!--</span>-->
  <!--<v-spacer></v-spacer>-->
  <!--<v-toolbar-items class="ap-0">-->
  <!--<v-btn v-if="getAccountLocked && getAccountActive" @click="openUnlockDialog()" icon>-->
  <!--<v-icon>lock</v-icon>-->
  <!--</v-btn>-->

  <!--<v-btn v-else-if="getAccountActive" @click="lockAccount()" icon>-->
  <!--<v-icon>lock_open</v-icon>-->
  <!--</v-btn>-->


  <!--</v-toolbar-items>-->
  <!--</v-toolbar>-->
  <!--<v-content>-->
  <!--<v-container grid-list-md text-xs-center>-->
  <!--<router-view></router-view>-->
  <!--</v-container>-->
  <!--</v-content>-->
  <!--<v-dialog v-model="unlockDialog" max-width="290">-->
  <!--<v-card>-->
  <!--<v-card-title v-html="unlockDialogTitle" class="headline"></v-card-title>-->
  <!--<v-card-text><v-text-field type="password" label="Password" v-model="password" required></v-text-field></v-card-text>-->
  <!--<v-card-actions>-->
  <!--<v-spacer></v-spacer>-->
  <!--<v-btn v-if="loading" disabled color="trasnaperent"><v-progress-circular indeterminate color="primary"></v-progress-circular></v-btn>-->
  <!--<v-btn v-else color="primary" @click="unlockAccount(password)">Unlock</v-btn>-->
  <!--<v-btn v-if="!loading" flat @click="unlockDialog = false">Close</v-btn>-->
  <!--</v-card-actions>-->
  <!--</v-card>-->
  <!--</v-dialog>-->
  <!--<v-snackbar-->
  <!--:timeout="snackbarTime"-->
  <!--top-->
  <!--v-model="snackbar"-->
  <!--&gt;-->
  <!--<p class="snackbarTextColor">{{snackbarText}}</p>-->
  <!--</v-snackbar>-->
  <!--</v-app>-->
</template>

<script>
  import {mapGetters} from 'vuex'

  export default {
    data: () => ({
      snackbar: false,
      snackbarTime: 5000,
      snackbarText: null,
      snackbarTextColor: 'white',
      loading: false,
      password: null,
      unlockDialog: null,
      unlockDialogTitle: 'Unlock Account',
      unlockDialogMessage: 'Unlock Account',
      drawer: null,
      dotVisible: true
    }),
    computed: {
      ...mapGetters([
        'getTableRowsgetEndpointRefreshInterval',
        'getEndpointConnectionStatus',
        'getAccountLocked',
        'getAccountActive',
        'getEndpointRefreshInterval',
        'getAccount',
        'getCurrentEndpoint'
      ])
    },
    methods: {
      launchSnackbar (duration, snackbarText, snackbarTextColor) {
        this.snackbar = false
        this.snackbarTime = duration || 0
        this.snackbarText = snackbarText
        this.snackbar = true
      },
      unlockAccount (password) {
        this.loading = true
        this.delay(500, () => {
          this.$store.dispatch('unlockAccount', password).then((ok) => {
            this.loading = false
            this.password = null
            this.unlockDialog = false
            this.launchSnackbar(3000, 'Account unlocked', 'red')
          }, (err) => {
            this.loading = false
            this.password = null
            if (err) {
              this.launchSnackbar(3000, 'Wrong password', 'red')
            }
          })
        })
      },
      openUnlockDialog () {
        this.unlockDialog = true
      },
      ping () {
        if (this.getCurrentEndpoint !== null) {
          this.$store.dispatch('pingEndpoint')
          if (this.getAccountActive && !this.getAccountLocked) {
            this.$store.dispatch('updateMatchRequested')
            this.$store.dispatch('updateMatchRequests')
          }
        }
      },
      lockAccount () {
        this.$store.dispatch('lockAccount').then((res) => {
          this.launchSnackbar(3000, 'Account locked', 'red')
        })
      },
      delay (amount, cb) {
        setTimeout(cb, amount)
      }
    },
    mounted () {
      setInterval(this.ping, this.getEndpointRefreshInterval)
    }
  }
</script>
