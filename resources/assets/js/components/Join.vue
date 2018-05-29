<template>
  <div>
    <section class="hero is-dark is-medium">
      <div class="hero-body">
        <div class="container">
          <!--<p>EOS.host has been upgraded to dawn-v4.1.0 and now voting are supported. For BPs who previously joined,-->
          <!--please refer to the following steps to join again and register producer.</p>-->

          <!--<p>1. Upgrade EOS to dawn-v4.1.0.</p>-->

          <!--<p>2. Delete "data" directory.</p>-->

          <!--<p>3. Run run.sh.</p>-->

          <!--<p>4. Register bp: cleos system regproducer your_account your_producer_key your_url</p>-->

          <!--<h2 class="subtitle">-->
          <!--How to connect-->
          <!--Simply follow the steps after fill out the form below.-->
          <!--</h2>-->
        </div>
      </div>
      <div class="columns">
        <div class="column is-two-thirds fluid">
          <div class="container">
            <h1 style="color:white">Information about your block producer</h1>
            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white has-text-left">Nick Name</label>
                  <div class="control">
                    <input class="input" v-model="list.producer_name">
                  </div>
                  <small v-if="inputErrors.producer_name" class="has-text-danger">{{inputErrors.producer_name[0]}}</small>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white has-text-left">Account Name</label>
                  <div class="control has-icons-left has-icons-right">
                    <input :class="!correctAccountName && this.list.organization_name!=='' ? 'input is-danger' : 'input'"
                           v-model="list.organization_name">
                  </div>
                  <small v-if="inputErrors.organization_name" class="has-text-danger">{{inputErrors.organization_name[0]}}</small>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white">Location</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" v-model="list.location">
                  </div>
                    <small v-if="inputErrors.location" class="has-text-danger">{{inputErrors.location[0]}}</small>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white">URI/IP</label>
                  <div class="control has-icons-left has-icons-right">
                    <input :class="!correcturlip && list.domain!=='' ? 'input is-danger' : 'input'"
                           v-model="list.domain">
                  </div>
                        <small v-if="inputErrors.domain" class="has-text-danger">{{inputErrors.domain[0]}}</small>
                </div>
              </div>
            </div>

            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white">HTTP</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" v-model="list.http_port">
                  </div>
                  <small v-if="inputErrors.http_port" class="has-text-danger">{{inputErrors.http_port[0]}}</small>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white">P2P</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input" type="text" v-model="list.p2p_port">
                  </div>
                    <small v-if="inputErrors.p2p_port" class="has-text-danger">{{inputErrors.p2p_port[0]}}</small>
                </div>
              </div>
            </div>


            <div class="field">
              <label class="has-text-white">Public Key</label>
              <div class="control has-icons-left has-icons-right">
                <input :class="!correctPublicKey && list.public_key!=='' ? 'input is-danger' : 'input is-success'"
              v-model="list.public_key">
              </div>
              <p v-if="!correctPublicKey && list.public_key!==''" class="help is-danger">Invalid Public Key</p>
            </div>
            <div class="field">
              <label class="has-text-white">Website</label>
              <div class="control has-icons-left has-icons-right">
                <input :class="!correctPublicKey && list.website!=='' ? 'input is-danger' : 'input is-success'"
              v-model="list.website">
              </div>
              <small v-if="inputErrors.website" class="has-text-danger">{{inputErrors.website[0]}}</small>
              <!-- <p v-if="!correctPublicKey && list.public_key!==''" class="help is-danger">Invalid Public Key</p> -->
            </div>
            <div class="field">
              <div class="control">
                <label class="checkbox">
                  <input type="checkbox">
                  I agree to the <a href="#">terms and conditions</a>
                </label>
              </div>
            </div>

            <div class="field">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="question">
                  Yes
                </label>
                <label class="radio">
                  <input type="radio" name="question">
                  No
                </label>
              </div>
            </div>

            <div class="field is-grouped">
              <div class="control">
                <a class="button" :download="fileName" :href="zipcontent"><b>Keystore
                </b></a>
                <button class="button is-link" @click="saveToDB">Submit</button>
              </div>
              <div class="control">
                <button class="button is-text">Cancel</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
  import JSZip from 'jszip'
  import FileSaver from 'file-saver'
  import axios from 'axios'

  export default {
    data () {
      return {
        list:{
          producer_name:'eoshenzhen',
          organization_name:'eoshenzhen22',
          domain:'127.12.32.32',
          location: 'Shenzhen',
          http_port:'8888',
          p2p_port:'21',
          website: 'eoshenzhen.io',
          public_key: 'EOS8MiE8qqwQ226ZQmR4jbJwwBFTJs88N7do8WeLas2HR68xXYDFx'
        },
        inputErrors:{},
        validPubk: false,
        validAccountName: false,
        validurlip: false,
        configini: {},
        fileName: 'pp',
        zipcontent: ''
      }
    },
    methods: {
      // https://stuk.github.io/jszip/documentation/examples.html
      generateConfigini () {
        let zip = new JSZip()
        // zip.file('Hello.sh', 'Hello World\n');
        let killcontent = ''
        let runcontent = ''
        let configcontent = ''
        let genesiscontent = ''
        zip.file('kill.sh', killcontent)
        zip.file('run.sh', runcontent)
        zip.file('config/config.ini', configcontent)
        zip.file('config/genesis.json', genesiscontent)
        // var img = zip.folder('images')
        // img.file('pikachu.jpeg', imgData, {base64: true})
        zip.generateAsync({type: 'blob'})
          .then(function (content) {
            console.log(content)
            // this.zipcontent = content

            // let zipName = String(this.list.producer_name)
            // FileSaver.saveAs(content, zipName);
            // see FileSaver.js
            FileSaver.saveAs(content, "example.zip");
          })
      },
      saveToDB () {
        // this.$data all the data{}
        // axios.post('/eosvoting/store', this.$data).then((response) => console.log(response.config.data))
        //   .catch((error) => console.log(error))
        axios.post('/eosvoting', this.$data.list).then((response) => console.log(response))
            .catch((error) =>
              this.inputErrors =
              error.response.data.errors
              // console.log('inputErrors', this.inputErrors)
            )
      }
    },
    computed: {
      correcturlip () {
        this.validurlip = false
        // https://stackoverflow.com/questions/3809401/what-is-a-good-regular-expression-to-match-a-url
        // let re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/) // match ip address
        let re = new RegExp(/[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi)
        this.validurlip = this.list.domain.match(re)
        // let res = this.list.domain.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g)
        // if (res === null) {
        //   this.validurlip = false
        // } else {
        //   this.validurlip = true
        // }
        return this.validurlip
      },
      correctAccountName () {
        if (this.list.organization_name.length !== 12) {
          this.validAccountName = false
        } else {
          this.validAccountName = true
        }
        return this.validAccountName
      },
      correctPublicKey () {
        this.$store.dispatch('isValidPublicKey', this.list.public_key).then((ok) => {
          console.log('awesome pubkey')
          this.validPubk = true
        }, (err) => {
          this.validPubk = false
          // console.log(err)
        })
        return this.validPubk
      }
    }
  }
</script>

<style scoped>

</style>
