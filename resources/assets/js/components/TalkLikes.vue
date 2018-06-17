<template>
    <div>
        <div v-if="signedIn">
            <button @click="toggle" class="border py-2 px-4 flex items-center" :class="classes">
                <svg class="w-6 h-6 mr-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"/></svg>
                {{ likes_count }}
            </button>
        </div>
        <div class="flex items-center" v-else>
            <svg class="w-6 h-6 mr-2 fill-current text-red" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 3.22l-.61-.6a5.5 5.5 0 0 0-7.78 7.77L10 18.78l8.39-8.4a5.5 5.5 0 0 0-7.78-7.77l-.61.61z"/></svg>
            {{ likes_count }}
        </div>
    </div>
</template>

<script>
export default {
  props: ['talk'],

  data() {
    return {
      isLiked: this.talk.is_liked,
      likes_count: this.talk.likes_count,
      signedIn: window.Laravel.signedIn
    };
  },

  computed: {
    classes() {
      return this.isLiked
        ? 'border-red-light bg-red-light text-white'
        : 'border-grey-light bg-grey-light text-grey-dark';
    }
  },

  methods: {
    toggle() {
      this.isLiked ? this.unlike() : this.like();
    },

    async like() {
      await axios.post(`/talks/${this.talk.id}/like`);

      this.likes_count++;
      this.isLiked = true;
    },

    async unlike() {
      await axios.delete(`/talks/${this.talk.id}/like`);

      this.likes_count--;
      this.isLiked = false;
    }
  }
};
</script>

