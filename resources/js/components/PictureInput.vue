<template id="app">
    <picture-input 
        ref="pictureInput" 
        width="100" 
        height="100" 
        margin="16" 
        :plain="true"
        accept="image/jpeg,image/png" 
        size="10" 
        radius="50"
        :hide-change-button="true"
        :removable= "true"
        remove-button-class="btn btn-info text-white"
        prefill="..\img\default_user.png"
        :custom-strings="{
            remove: 'remove'
        }">
    </picture-input>
</template>

<script>
import PictureInput from 'vue-picture-input'
 
export default {
  name: 'app',
  data () {
    return {
    }
  },
  components: {
    PictureInput
  },
  methods: {
    onChange (image) {
      console.log('New picture selected!')
      if (image) {
        console.log('Picture loaded.')
        this.image = image
      } else {
        console.log('FileReader API not supported: use the <form>, Luke!')
      }
    }
  }
}
</script>