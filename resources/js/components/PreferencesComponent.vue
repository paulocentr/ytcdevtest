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
    this.$root.$on("preference-created", () => {
      this.getPreferences();
    });
  },
  props: ["customerid", "numberid"],
  data() {
    return {
      columns: [
        {
          label: "Name",
          field: "name",
          representedAs: ({ id, name, number_id }) =>
            `
          ${name}
          `,
          interpolate: true,
        },
        {
          label: "Value",
          field: "value",
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
    getPreferences: function () {
      axios.get("/" + this.customerid + "/" + this.numberid + "/preferences/get").then(
        function (res) {
          console.log(res);
          this.rows = res.data;
        }.bind(this)
      );
    },
    submitNewPreference() {
      this.formerrors = {};
    },
  },
  created: function () {
    this.getPreferences();
  },
};
</script>
