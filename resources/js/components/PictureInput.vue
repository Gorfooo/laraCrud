<!--<template>
  <div class="hello">    
    <picture-input 
      ref="pictureInput" 
      @change="onChange" 
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
  </div>
</template>

<script>
import PictureInput from 'vue-picture-input'
 
export default {
  data () {
    return {
    }
  },
  components: {
    PictureInput
  },
  methods: {
    onChange (image) {
      if (image) this.image = image
    }
  }
}
var formData = new FormData();
var imagefile = document.querySelector('#file');
formData.append("image", imagefile.files[0]);
axios.post('upload_file', formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
})
</script>