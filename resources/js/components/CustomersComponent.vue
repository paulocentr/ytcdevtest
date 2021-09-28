<template>
  <div>
    <bootstrap-4-datatable
        :columns="columns"
        :data="rows"
        :filter="filter"
        :per-page="perPage"
        ></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager
        v-model="page"
        type="abbreviated"
        >
    </bootstrap-4-datatable-pager>
  </div>
</template>

<script>
export default {
  mounted() {
    this.$root.$on('customer-created', () => {
      this.getCustomers()
    })
  },
  props: [
    'storeCustomerRoute'
  ],
  data() {
    return {
      columns: [
        {
          label: "Name",
          field: "name",
          representedAs: ({ id, name }) => `
          <a href="/customers/${id}/edit">${name}<a>
          `,
          interpolate: true,
        },
        {
          label: "Document",
          field: "document",
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
    getCustomers: function () {
      axios.get("/customers/get").then(
        function (res) {
          console.log(res);
          this.rows = res.data;
        }.bind(this)
      );
    },
    submitNewCustomer() {
      this.formerrors = {};
    },
  },
  created: function () {
    this.getCustomers();
  },
};
</script>
