<template>
  <div>
    <div>
      <button
        type="button"
        class="btn btn-outline-info"
        data-toggle="modal"
        data-target="#new-customer"
      >
        <i class="far fa-add"></i> New Customer
      </button>
    </div>
    <div
      class="modal fade"
      id="new-customer"
      tabindex="-1"
      role="dialog"
      aria-labelledby="new-customerTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document" id="addcustomermodal">
        <form @submit.prevent="submitNewCustomer" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">
                New Customer
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
                <div class="col-md-12 form-group">
                  <label for="">Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="name"
                    v-model="formfields.name"
                    required
                  />
                  <span class="help-block text-danger" v-if="'name' in formerrors">{{ formerrors.name[0] }}</span>
                </div>
                <div class="col-md-12 form-group">
                  <label for="">Document</label>
                  <input
                    type="text"
                    class="form-control"
                    maxlength="12"
                    name="document"
                    v-model="formfields.document"
                    required
                  />
                  <span class="help-block text-danger" v-if="'document' in formerrors">{{ formerrors.document[0] }}</span>
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
  mounted() {

  },
  data() {
    return {
      formerrors: {},
      formfields: {},
    };
  },
  methods: {
    submitNewCustomer() {
      this.formerrors = {};
      console.log(this.formfields);
      axios
        .post(this.formurl, this.formfields)
        .then((response) => {
          toastr.success('Customer created successfully')
          this.$root.$emit('customer-created')
          $('#new-customer').modal('toggle')
          $('.modal-backdrop').hide()
          console.log(response)
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
