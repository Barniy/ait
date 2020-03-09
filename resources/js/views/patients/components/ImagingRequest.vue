<template>
  <v-container>
    <v-row justify="center">
      <v-dialog v-model="imagingRequestDialog" persistent max-width="1500px">
        <template v-slot:activator="{ on }">
          <v-btn absolute dark fab top right color="primary" v-on="on">
            <v-icon>mdi-plus</v-icon>
          </v-btn>
        </template>
        <v-card>
          <v-toolbar>
            <v-toolbar-title>Imaging Request</v-toolbar-title>
          </v-toolbar>
          <v-card-text>
            <v-form>
              <v-container>
                <v-row>
                  <v-col cols="12" sm="5">
                    <v-text-field label="Provisional Diagnosis" v-model="provisionalDiagnosis"></v-text-field>
                    <v-row>
                      <v-col cols="12" sm="6">
                        <header>Patient Condition</header>
                        <v-switch
                          v-for="condition in patientConditions"
                          :key="condition.key"
                          inset
                          v-model="condition.isChecked"
                          :label="condition.description"
                          :value="condition.isChecked"
                        ></v-switch>
                      </v-col>
                      <v-col cols="12" sm="6">
                        <header>Examination Requested</header>
                        <v-switch
                          v-for="imaging in imagingTests"
                          :key="imaging.key"
                          inset
                          v-model="imaging.isChecked"
                          :label="imaging.description"
                          :value="imaging.isChecked"
                        ></v-switch>
                      </v-col>
                    </v-row>
                  </v-col>
                  <v-col cols="12" sm="6" justify>
                    <v-textarea
                      class="mx-2"
                      v-model="clinicalInformation"
                      label="Clinical Information"
                      rows="1"
                    ></v-textarea>
                    <v-textarea
                      outlined
                      v-model="note"
                      name="input-7-4"
                      rows="16"
                      label="Procedure"
                    ></v-textarea>
                  </v-col>
                </v-row>
              </v-container>
            </v-form>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="blue darken-1" text @click="imagingRequestDialog = false">Cancel</v-btn>
            <v-btn color="blue darken-1" text @click="onSaveImagimgRequest">Save</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: "ImagingRequest",
  props: ["id"],
  data: () => ({
    imagingTests: [],
    clinicalInformation: "",
    provisionalDiagnosis: "",
    patientConditions: [],
    note: "",
    imagingRequestDialog: false
  }),
  computed: {
    loggedIn: () => {
      return window.user;
    }
  },
  methods: {
    getLookupImagingTestAttributes() {
      axios
        .get("/api/attributeExamination/", {
          params: {
            type: "imaging"
          }
        })
        .then(result => {
          this.imagingTests = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getLookupConditionAttributes() {
      axios
        .get("/api/attributeConditions")
        .then(result => {
          this.patientConditions = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    onSaveImagimgRequest() {
      let patientConditions = [];
      this.patientConditions.forEach(condition => {
        if (condition.isChecked) {
          patientConditions.push(condition.key);
        }
      });
      let imagingTests = [];
      this.imagingTests.forEach(test => {
        if (test.isChecked) {
          imagingTests.push(test.key);
        }
      });

      axios
        .post("/api/patients/addImagingRequest", {
          patientId: this.id,
          userId: this.loggedIn.user.id,
          provisionalDiagnosis: this.provisionalDiagnosis,
          clinicalInformation: this.clinicalInformation,
          patientConditions: patientConditions,
          examinationRequested: imagingTests,
          description: this.note,
          status: "CREATED"
        })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.error(err);
        });
    }
  },
  created() {
    this.getLookupImagingTestAttributes();
    this.getLookupConditionAttributes();
  }
};
</script>

<style>
</style>
