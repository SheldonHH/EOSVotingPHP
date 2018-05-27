<template>
    <v-container grid-list-xl text-xs-left>
        <v-layout row wrap fill-height>
            <v-flex d-flex xs3>
                <v-card color="blue-grey darken-4" dark>
                    <v-container class="px-4 py-4">
                        <v-flex tag="h1" class="white--text display-1 my-0 px-0">Account information</v-flex>
                        <v-flex xs-12 class="caption px-0">Here you can check your account name, key pairs and SYS balance.</v-flex>
                    </v-container>
                </v-card>
            </v-flex>

            <v-flex d-flex xs9 v-if="accountCreated">
                <v-layout row wrap>
                    <v-flex d-flex>
                        <v-layout row wrap>
                            <v-flex tag="h1" mb-0 class="headline">Current Account</v-flex>
                            <v-flex d-flex xs12>
                                <v-card color="blue-grey darken-4" dark>
                                    <v-container class="px-4 py-4">
                                        <v-layout row wrap>
                                            <v-flex xs12 class="body-1 blue-grey--text">
                                                <p class="title mb-2 white--text">{{ accountName }}</p>
                                                Public Key : {{ publicKey }}<br>
                                                Private Key : {{ privateKey }}
                                            </v-flex>
                                        </v-layout>
                                    </v-container>
                                </v-card>
                            </v-flex>

                            <v-flex tag="h1" mb-0 class="headline">Balance</v-flex>
                            <v-flex d-flex xs12>
                                <v-card color="blue-grey darken-4" dark>
                                    <v-container class="px-4 py-4">
                                        <v-layout row wrap justify-space-between pb-4 mb-4>
                                            <v-flex xs6>
                                                <p class="display-1 mb-0">0 Stakes</p>
                                                <p class="display-1 mb-0 blue-grey--text">0 Refunding</p>
                                            </v-flex>
                                            <v-flex xs6 text-xs-right>
                                                <p class="display-1 mb-0">100</p>
                                                <p class="display-1 mb-0 blue-grey--text">Total SYS</p>
                                            </v-flex>
                                        </v-layout>
                                        <v-flex xs12 m-0 class="blue-grey--text">* For EOS.host testnet balance only.</v-flex>
                                        <v-btn class="btn stakesbtn" absolute dark mx-0 my-0>Get More SYS</v-btn>
                                    </v-container>
                                </v-card>
                            </v-flex>
                        </v-layout>
                    </v-flex>
                </v-layout>
            </v-flex>

            <v-flex d-flex xs9 v-else>
                <v-layout row wrap>
                    <v-flex tag="h1" xs12 mb-0 class="headline">Create new account</v-flex>
                    <v-flex tag="p" mb-0 pb-0 class="white--text">Step 1</v-flex>
                    <v-flex d-flex xs12>
                        <v-card color="blue-grey darken-4" dark>
                            <v-container class="px-4 py-4">
                                <v-layout row wrap>
                                    <v-flex xs12 class="display-1 border-bottom">
                                        Generate Key Pairs
                                        <p class="body-1 blue-grey--text mb-0">Key pairs will be generated locally and will not be sent to the internet.</p>
                                    </v-flex>
                                    <v-flex xs12 class="body-1 blue-grey--text">
                                        Public Key : {{ publicKey }}<br>
                                        Private Key : {{ privateKey }}
                                    </v-flex>
                                    <v-btn class="btn generatebtn" absolute dark mx-0 my-0 :disabled="!!(publicKey && privateKey)" @click="generate">Generate</v-btn>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-flex>

                    <v-flex tag="p" mb-0 pb-0 class="white--text">Step 2</v-flex>
                    <v-flex d-flex xs12>
                        <v-card color="blue-grey darken-4" dark>
                            <v-container class="px-4 py-4">
                                <v-layout row wrap>
                                    <v-flex xs12 class="display-1 border-bottom">
                                        Create Account
                                        <p class="body-1 blue-grey--text mb-0">EOS testnet account will be created</p>
                                    </v-flex>
                                    <v-flex xs10 pb-0>
                                        <v-text-field v-model="accountName" color="white" placeholder="Your account name (12 chars in .12345abcdefghijklmnopqrstuvwxyz)"></v-text-field>
                                    </v-flex>
                                    <v-btn class="btn createbtn" absolute dark mx-0 my-0 :disabled="!(publicKey && privateKey)" @click="create">Create</v-btn>
                                    <v-flex tag="p" xs12 py-0 v-if="errorMessage" class="subheading red--text">{{ errorMessage }}</v-flex>
                                </v-layout>
                            </v-container>
                        </v-card>
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script>
  import ecc from 'eosjs-ecc'
  export default {
    name: 'generate-account',
    methods: {
      generate () {
        ecc.randomKey().then(privateKey => {
          this.privateKey = privateKey
          this.publicKey = ecc.privateToPublic(privateKey)
          console.log('Private Key:\t', this.privateKey) // wif
          console.log('Public Key:\t', this.publicKey) // EOSkey...
        })
        // let privkeyError = null
        // try {
        //   let pub2 = PrivateKey.fromWif(privkey).toPublic().toString()
        //   if (pubkey !== pub2) {
        //     throw {message: 'public key miss-match: ' + pubkey + ' !== ' + pub2}
        //   }
        // } catch (error) {
        //   console.log('privkeyError', error, privkey)
        //   privkeyError = error.message + ' => ' + privkey
        // }
        //
        // if(privkeyError || pubkeyError) {
        //   privkey = 'DO NOT USE'
        //   pubkey = 'DO NOT USE'
        // }

        window.localStorage.setItem('publicKey', this.publicKey)
        window.localStorage.setItem('privateKey', this.privateKey)
      },
      create () {
        // async generate account
        // this.$http
        if (this.accountName.length !== 12) {
          this.validAccountName = false
        } else {
          this.validAccountName = true
        }
        // error message
        // this.errorMessage = 'Account Duplicated，Change Another One Please!'
        // this.errorMessage = 'account names must be 12 chars long'
        // this.errorMessage = 'Invaild Name(12 chars in .12345abcdefghijklmnopqrstuvwxyz)'

        // record account name
        window.localStorage.setItem('name', this.accountName)

        this.accountCreated = true
      }
    },

    created () {
      this.accountName = window.localStorage.getItem('name') || ''
      this.publicKey = window.localStorage.getItem('publicKey') || ''
      this.privateKey = window.localStorage.getItem('privateKey') || ''

      if (this.accountName) {
        this.accountCreated = true
      }
    },

    data () {
      return {
        accountName: '',
        publicKey: '',
        privateKey: '',
        errorMessage: '',

        accountCreated: false
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
</style>