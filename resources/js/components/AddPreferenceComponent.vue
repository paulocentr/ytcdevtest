<template>
  <div>
    <button
      type="button"
      class="btn btn-outline-primary"
      data-toggle="modal"
      data-target="#addpreferencemodal"
    >
      <i class="far fa-add"></i> Create Preference
    </button>
    <div
      class="modal fade"
      id="addpreferencemodal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="addpreferencemodalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form @submit.prevent="submitNewPreference" method="POST">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addpreferencemodalLabel">
                Create Preference
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
                <div class="col-md-12">
                  <label for="">Value</label>
                  <input
                    type="text"
                    class="form-control"
                    name="value"
                    v-model="formfields.value"
                    required
                  />
                  <span class="help-block text-danger" v-if="'value' in formerrors">{{ formerrors.value[0] }}</span>
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
    submitNewPreference() {
      this.formerrors = {};
      console.log(this.formfields);
      axios
        .post(this.formurl, this.formfields)
        .then((response) => {
          toastr.success("Preference created successfully");
          this.$root.$emit("preference-created");
          $("#addpreferencemodal").modal("toggle");
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
