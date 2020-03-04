<template>
  <div>
    <v-card>
      <v-toolbar>
        <v-text-field
          solo-inverted
          v-model="search"
          append-icon="mdi-magnify"
          label="Search"
          single-line
          hide-details
          class="hidden-sm-and-down"
        />
        <v-spacer></v-spacer>
        <v-btn @click="onNewPatinet()" class="text-transform-none">
          <v-icon dark left>mdi-plus</v-icon>Patinet
        </v-btn>
      </v-toolbar>
      <v-data-table
        :headers="headers"
        :items="tableData"
        item-key="id"
        class="elevation-1"
        loading-text="Loading... Please wait"
        :loading="loading"
        no-data-text="No Record found"
        :options.sync="pagination"
        :server-items-length="pagination.totalItems"
        :items-per-page="pagination.itemsPerPage"
        @click:row="patientDetail"
      >
        <template v-slot:item.action="{ item }">
          <v-icon small class="mr-2" @click.stop="onEditPatient(item)">mdi-circle-edit-outline</v-icon>
          <v-icon small @click.stop="onDeletePatient(item)">mdi-delete-circle</v-icon>
        </template>
      </v-data-table>
    </v-card>
  </div>
</template>

<script>
export default {
  name: "Patients",
  data() {
    return {
      search: "",
       loading: true,
      pagination: { totalItems: null, itemsPerPage: null, page: null },
      headers: [
        {
          text: "Id",
          sortable: false,
          align: ' d-none',
          value: "id"
        },
        {
          text: "MCN",
          align: "left",
          sortable: false,
          value: "medicalRecordNumber"
        },
        { text: "Full Name", value: "fullName" },
        { text: "Gender", value: "gender" },
        { text: "Date Of Birth", value: "dateOfBirth" },
        {
          text: "Phone Number",
          value: "address.mobilePhoneNumber"
        },
        { text: "Actions", value: "action", sortable: false }
      ],
      tableData: []
    };
  },
  methods: {
    patientDetail(event) {
      this.$router.push('/admin/patient/'+ event.id);
    },
    initialized() {
      this.getPatients();
    },
    totalItems() {
      return this.pagination.totalItems;
    },
    rowsPerPageItems() {
      return this.pagination.rowsPerPageItems;
    },
    getPatients(page) {
      axios
        .get("/api/patients?page=" + this.pagination.page)
        .then(result => {
          this.tableData = result.data.data;
          this.pagination.page = result.data.meta.current_page;
          this.pagination.itemsPerPage = result.data.meta.per_page;
          this.pagination.totalItems = result.data.meta.total;
          this.loading = false;
        })
        .catch(err => {});
    },
    onNewPatinet() {},
    onEditPatient() {},
    onDeletePatient() {}
  },
  watch: {
    pagination: {
      handler() {
        this.getPatients();
      },
      deep: true
    }
  },
  created() {
    this.initialized();
  }
};
</script>



<style scoped>
.v-btn {
  text-transform: none !important;
}
</style>
