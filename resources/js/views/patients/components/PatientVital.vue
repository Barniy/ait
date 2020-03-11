<template>
  <v-container fluid>
    <v-data-table
      :headers="headers"
      :items="tableData"
      item-key="id"
      class="elevation-1"
      loading-text="Loading... Please wait"
      :loading="loading"
      no-data-text="No Record found"
    >
      <template v-slot:top>
        <v-toolbar flat color="white">
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on }">
              <v-btn color="primary" dark class="mb-2" v-on="on">
                <v-icon dark left>mdi-plus</v-icon>Vital
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.bloodPressure" label="Blood Pressure"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.perRectum" label="Per Rectum"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.respiratoryRate" label="Respiratory Rate"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.temperature" label="Temperature"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.oxygenSaturation" label="Oxygen Saturation"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field v-model="editedItem.height" label="Height"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field v-model="editedItem.weight" label="Weight"></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                     <v-select
                    :items="departments"
                    filled
                    chips
                    v-model="editedItem.department"
                    item-text="name"
                    item-value="id"
                    label="department"
                    multiple
                  ></v-select>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.action="{ item }">
        <v-icon small class="mr-2" @click.stop="onEditVitalt(item)">mdi-circle-edit-outline</v-icon>
        <v-icon small @click.stop="onDeleteVital(item)">mdi-delete-circle</v-icon>
      </template>
    </v-data-table>
  </v-container>
</template>

<script>
export default {
  name: "PatientVital",
  props: ["id"],
  data: () => ({
    tableData: [],
    departments:[],
    pagination: { totalItems: null, itemsPerPage: null, page: null },
    search: "",
    loading: true,
    editedIndex: -1,
    dialog: false,
    editedItem: {
      bloodPressure: "",
      perRectum: "",
      respiratoryRate: "",
      temperature: "",
      oxygenSaturation: "",
      height: "",
      weight: "",
      patientId: "",
      department:'',
      userId: "2"
    },
    defaultItem: {
      bloodPressure: "",
      perRectum: "",
      respiratoryRate: "",
      temperature: "",
      oxygenSaturation: "",
      height: "",
      weight: "",
       department:'',
    },
    headers: [
      {
        text: "Id",
        sortable: false,
        align: " d-none",
        value: "id"
      },
      {
        text: "BP",
        value: "bloodPressure"
      },
      { text: "PR", value: "perRectum" },
      { text: "RR", value: "respiratoryRate" },
      { text: "Temperature", value: "temperature" },
      {
        text: "O2 Saturation",
        value: "oxygenSaturation"
      },
      {
        text: "Weight",
        value: "weight"
      },
      {
        text: "Height",
        value: "height"
      },
      {
        text: "Nurse",
        value: "user.fullName"
      }
    ]
  }),
  computed: {
    formTitle() {
      return "New Vital";
    }
  },

  watch: {
    dialog(val) {
      val || this.close();
    }
  },
  methods: {
    initialized() {
      this.getVitals();
    },
    getVitals() {
      axios
        .get("/api/vitals/" + this.id)
        .then(result => {
          this.tableData = result.data.data;
          this.loading = false;
        })
        .catch(err => {});
    },
    onEditVitalt() {},
    onDeleteVital() {},
    close() {
      this.dialog = false;
      setTimeout(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      }, 300);
    },

    save() {
      this.editedItem.patientId = this.id;
      axios
        .post("/api/vitals/", this.editedItem)
        .then(response => {
          this.getVitals();
        })
        .catch(err => {});
      this.close();
    },
    getDepartments(){
        axios.get('/api/departments')
        .then(response => {
            this.departments = response.data.data;
            console.log(this.department)
        })
        .catch(function (error) {
        })
    }
  },

  created() {
    this.initialized();
    this.getDepartments();
  }
};
</script>

<style>
</style>
