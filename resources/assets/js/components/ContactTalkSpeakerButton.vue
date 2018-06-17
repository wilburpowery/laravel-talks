<template>
    <div class="flex items-center">
        <button v-if="!sending" @click="contact" class="text-xs font-bold">
            Give this talk at my conference >
        </button>
        <spinner v-else></spinner>
    </div>
</template>

<script>
import Spinner from 'vue-spinner-component/src/Spinner.vue';

export default {
  props: ['talkId'],

  components: { Spinner },

  data() {
    return {
      sending: false
    };
  },

  methods: {
    async contact() {
      this.sending = true;
      await axios.post(`/talks/${this.talkId}/contact-speaker`);
      window.Events.$emit(
        'notify',
        'We have sent an email to the speaker with your details.'
      );
      this.sending = false;
    }
  }
};
</script>

