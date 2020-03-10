<template>
  <v-row justify="center">
    <v-dialog v-model="labRequestDialog" transition="dialog-bottom-transition">
      <template v-slot:activator="{ on }">
        <v-btn absolute dark fab top right color="primary" v-on="on">
          <v-icon>mdi-plus</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-toolbar>
          <v-toolbar-title>Clinical Laboratory Request</v-toolbar-title>
        </v-toolbar>
        <v-card-text>
          <v-form>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6">
                  <v-autocomplete
                    :items="lab.specimenType"
                    filled
                    v-model="specimenTest"
                    chips
                    item-text="description"
                    item-value="key"
                    label="Specimen Type"
                    multiple
                  ></v-autocomplete>
                </v-col>
                <v-col cols="12" sm="6" justify>
                  <header>Priority</header>
                  <v-radio-group row v-model="lab.priority">
                    <v-radio value="STAT" label="STAT"></v-radio>
                    <v-radio value="ROUTIEN" label="Routine"></v-radio>
                    <v-radio value="URGENT" label="Urgent"></v-radio>
                  </v-radio-group>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" v-for="test in labType" :key="test.key">
                  <v-select
                    :items="test.attributeExaminationItems"
                    filled
                    chips
                    v-model="labTests"
                    item-text="description"
                    item-value="key"
                    :label="test.description"
                    multiple
                  ></v-select>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6">
                  <v-text-field label="note" required v-model="lab.description"></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="labRequestDialog = false">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="onSaveLabRequest">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
import Auth from "../../../auth";
export default {
  name: "LabRequest",
  props: ["id", "labRequest"],
  data() {
    return {
      labRequestDialog: false,
      tests: [],
      labType: [],
      labTests: [],
      specimenType: [],
      specimenTest: [],
      priority: "STAT",
      note: "",
      lab: {
        id: "",
        specimenType: [],
        LabTests: [],
        priority: "",
        description: "",
        status: "",
        createdAt: "",
        user: null
      }
    };
  },
  watch: {
    labRequest: function() {
      console.log("fire");
      this.lab = Object.assign({}, ...this.labRequest);

      this.labRequestDialog = true;
    }
  },
  computed: {
    loggedIn: () => {
      return window.user;
    }
  },
  methods: {
    remove(item) {},
    onSaveLabRequest() {
      axios
        .post("/api/patients/addLabRequest", {
          patientId: this.id,
          specimentType: this.specimenTest,
          labTests: this.labTests,
          priority: this.priority,
          userId: this.loggedIn.user.id,
          description: this.note,
          status: "CREATED"
        })
        .then(function(response) {})
        .catch(function(error) {});
    },
    getLookupLabTestAttributes() {
      axios
        .get("/api/attributeExamination/", {
          params: {
            type: "LABTEST"
          }
        })
        .then(result => {
          this.labType = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getLookupSpecimentAttributes() {
      axios
        .get("/api/attributeExamination/", {
          params: {
            type: "Specimen"
          }
        })
        .then(result => {
          this.specimenType = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  created() {
    this.getLookupLabTestAttributes();
    this.getLookupSpecimentAttributes();
  }
};
</script>

<style>
</style>
