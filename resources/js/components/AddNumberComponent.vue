<template>
  <div>
    <button
      type="button"
      class="btn btn-outline-primary"
      data-toggle="modal"
      data-target="#addnumbermodal"
    >
      <i class="far fa-add"></i> Create Number
    </button>
    <div
      class="modal fade"
      id="addnumbermodal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addnumbermodalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form @submit.prevent="submitNewNumber" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addnumbermodalLabel">
                Create Number
              </h5>
              <button
                type="button"
                class="close"
                data-dismiss="modal"
                aria-label="Close"
              >
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <label for="">Number</label>
                  <input
                    type="text"
                    class="form-control"
                    name="number"
                    v-model="formfields.number"

                  />
                  <span class="help-block text-danger" v-if="'number' in formerrors">{{ formerrors.number[0] }}</span>
                </div>
                <div class="col-md-12">
                  <label for="">Status</label>
                  <select
                    name="status"
                    id="status"
                    v-model="formfields.status"
                    class="form-control"

                  >
                    <option value="">Select</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="cancelled">Cancelled</option>
                  </select>
                  <span class="help-block text-danger" v-if="'status' in formerrors">{{ formerrors.status[0] }}</span>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                class="btn btn-secondary"
                data-dismiss="modal"
              >
                Close
              </button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["formurl"],
  mounted() {},
  data() {
    return {
      formerrors: {},
      formfields: {},
    };
  },
  methods: {
    submitNewNumber() {
      this.formerrors = {};
      console.log(this.formfields);
      axios
        .post(this.formurl, this.formfields)
        .then((response) => {
          toastr.success("Number created successfully");
          this.$root.$emit("number-created");
          $("#addnumbermodal").modal("toggle");
          $(".modal-backdrop").hide();
          console.log(response);
        })
        .catch((e) => {
          var response = e.response.data
          this.formerrors = response.errors
          toastr.error(response.message)
        });
    },
  },
  created: function () {},
};
</script>
