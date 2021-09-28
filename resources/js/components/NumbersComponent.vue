<template>
  <div>
    <bootstrap-4-datatable
      :columns="columns"
      :data="rows"
      :filter="filter"
      :per-page="perPage"
    ></bootstrap-4-datatable>
    <bootstrap-4-datatable-pager v-model="page" type="abbreviated">
    </bootstrap-4-datatable-pager>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$root.$on("number-created", () => {
      this.getNumbers();
    });
  },
  props: ["customerid"],
  data() {
    return {
      columns: [
        {
          label: "Number",
          field: "number",
          representedAs: ({ id, number, customer_id }) =>
            `
          <a href="/${customer_id}/numbers/${id}/edit">${number}<a>
          `,
          interpolate: true,
        },
        {
          label: "Status",
          field: "status",
        },
        {
          label: "When",
          field: "when",
        },
        {
          label: "Actions",
          field: "actionform",
          sortable: false,
          interpolate: true,
        },
      ],
      rows: [],
      page: 1,
      filter: "",
      perPage: 12,
      formerrors: {},
      formfields: {},
    };
  },
  methods: {
    getNumbers: function () {
      axios.get('/'+this.customerid + "/numbers/get").then(
        function (res) {
          console.log(res);
          this.rows = res.data;
        }.bind(this)
      );
    },
    submitNewNumber() {
      this.formerrors = {};
    },
  },
  created: function () {
    this.getNumbers();
  },
};
</script>
