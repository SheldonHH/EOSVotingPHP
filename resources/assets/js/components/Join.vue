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
                  <label class="has-text-white has-text-left" style="padding-right: 250px">Nick Name</label>
                  <div class="control">
                    <input class="input" v-model="nickname">
                  </div>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white has-text-left" style="padding-right: 250px">Account Name</label>
                  <div class="control has-icons-left has-icons-right">
                    <input :class="!correctAccountName && this.accountName!=='' ? 'input is-danger' : 'input is-success'"
                           v-model="accountName">
                    <span class="icon is-small is-left">
      <i class="fas fa-user"></i>
    </span>
                    <span class="icon is-small is-right">
      <i class="fas fa-check"></i>
    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white" style="padding-right: 470px">Location</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="email">
                    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                  </div>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white" style="padding-right: 500px">URI/IP</label>
                  <div class="control has-icons-left has-icons-right">
                    <input :class="!correcturlip && urlip!=='' ? 'input is-danger' : 'input is-success'"
                           v-model="urlip">
                    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="columns">
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white" style="padding-right: 470px">HTTP</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="email">
                    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                  </div>
                </div>
              </div>
              <div class="column is-half">
                <div class="field">
                  <label class="has-text-white" style="padding-right: 500px">P2P</label>
                  <div class="control has-icons-left has-icons-right">
                    <input class="input is-danger" type="email">
                    <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                    <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
                  </div>
                </div>
              </div>
            </div>


            <div class="field">
              <label class="has-text-white" style="padding-right: 450px">Public Key</label>
              <div class="control has-icons-left has-icons-right">
                <input :class="!correctPublicKey && publicKey!=='' ? 'input is-danger' : 'input is-success'"
                       v-model="publicKey">
                <span class="icon is-small is-left">
      <i class="fas fa-envelope"></i>
    </span>
                <span class="icon is-small is-right">
      <i class="fas fa-exclamation-triangle"></i>
    </span>
              </div>
              <p v-if="!correctPublicKey && publicKey!==''" class="help is-danger">Invalid Public Key</p>
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
        nickname: '',
        accountName: '',
        publicKey: '',
        validPubk: false,
        validAccountName: false,
        urlip: '',
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

            // let zipName = String(this.nickname)
            // FileSaver.saveAs(content, zipName);
            // see FileSaver.js
            FileSaver.saveAs(content, "example.zip");
          })
      },
      saveToDB () {
        // this.$data all the data{}
        axios.post('/eosvoting', this.$data).then((response) => console.log(response))
          .catch((error) => console.log(error))
      }
    },
    computed: {
      correcturlip () {
        this.validurlip = false
        let re = new RegExp(/^((?:(?:(?:\w[\.\-\+]?)*)\w)+)((?:(?:(?:\w[\.\-\+]?){0,62})\w)+)\.(\w{2,6})$/) // match ip address
        this.validurlip = this.urlip.match(re)
        // let res = this.urlip.match(/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/g)
        // if (res === null) {
        //   this.validurlip = false
        // } else {
        //   this.validurlip = true
        // }
        return this.validurlip
      },
      correctAccountName () {
        if (this.accountName.length !== 12) {
          this.validAccountName = false
        } else {
          this.validAccountName = true
        }
        return this.validAccountName
      },
      correctPublicKey () {
        this.$store.dispatch('isValidPublicKey', this.publicKey).then((ok) => {
          console.log('awesome')
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