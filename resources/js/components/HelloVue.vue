<template>
  <select
    v-model="countrySelected"
    @change="onChange()"
  >
    <option v-for="option in countryOptions" :key="option.id" :value="option.value">
      {{ option.text }}
    </option>
  </select>

  <select
    v-model="validSelected"
    @change="onChange()"
  >
    <option v-for="option in validOptions" :key="option.id" :value="option.value">
      {{ option.text }}
    </option>
  </select>

  <div>
    <div v-for="option in numbers" :key="option.id">
      id: {{option.id}}, name: {{option.name}}, phone: {{option.phone}}
    </div>
  </div>

  <button v-if="currentPage > 1" @click="fetchLastPage">back</button>
  page {{currentPage}} of {{lastPage}}
  <button v-if="currentPage < lastPage" @click="fetchNextPage">next</button>
</template>

<script>

export default {
  name: 'HelloVue',
  data() {
    return {
      countryOptions: [
        {
          id: 0,
          text: "Cameroon",
          value: "Cameroon"
        },
        {
          id: 1,
          text: "Ethiopia",
          value: "Ethiopia"
        },
        {
          id: 2,
          text: "Morocco",
          value: "Morocco"
        },
        {
          id: 3,
          text: "Mozambique",
          value: "Mozambique"
        },
        {
          id: 4,
          text: "Uganda",
          value: "Uganda"
        }
      ],
      validOptions: [
        {
          id: 0,
          text: "valid",
          value: true
        },
        {
          id: 1,
          text: "not valid",
          value: false
        },
      ],
      countrySelected: "Cameroon",
      validSelected: true,
      numbers: [],
      currentPage: 1,
      lastPage: 1
    }
  },
  mounted() {
    this.onChange();
  },
  methods: {
    onChange() {
      this.currentPage = 1;
      this.fetchNumbers();
    },
    fetchNextPage() {
      this.currentPage++;
      this.fetchNumbers();
    },
    fetchLastPage() {
      this.currentPage--;
      this.fetchNumbers();
    },
    fetchNumbers() {
      axios.post('api/numbers', {country: this.countrySelected, valid: this.validSelected, page: this.currentPage})
        .then(res => {
          this.numbers = res.data.data
          this.lastPage = res.data.last_page
        });
    }
  }
}
</script>