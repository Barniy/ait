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
                    <v-text-field
                      label="Provisional Diagnosis"
                      v-model="imaging.provisionalDiagnosis"
                    ></v-text-field>
                    <v-row>
                      <v-col cols="12" sm="6">
                        <header>Patient Condition</header>
                        <v-switch
                          v-for="condition in editedAttributeConditions"
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
                          v-for="imaging in editedAttributeImagingTest"
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
                      v-model="imaging.clinicalInformation"
                      label="Clinical Information"
                      rows="1"
                    ></v-textarea>
                    <v-textarea
                      outlined
                      v-model="imaging.description"
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
            <v-btn color="blue darken-1" text @click="resetModal()">Cancel</v-btn>
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
  props: ["id", "imagingRequest"],
  data: () => ({
    imagingRequestDialog: false,
    imaging: {
      id: "",
      clinicalInformation: "",
      provisionalDiagnosis: "",
      createdAt: "",
      description: "",
      patientCondition: [],
      requestedExaminations: [],
      status: "",
      user: null
    },
    editedAttributeImagingTest: [],
    editedAttributeConditions: []
  }),
  watch: {
    imagingRequest: async function() {
      this.imaging = Object.assign({}, ...this.imagingRequest);

      this.getSelctedPatientConditions(this.imaging.patientCondition);
      this.getSelctedimagingRequest(this.imaging.requestedExaminations);

      this.imagingRequestDialog = !this.imagingRequestDialog;
    }
  },
  computed: {
    loggedIn: () => {
      return window.user;
    }
  },
  methods: {
    getLookupAttributeImagingTests() {
      axios
        .get("/api/attributeExamination/", {
          params: {
            type: "imaging"
          }
        })
        .then(result => {
          this.editedAttributeImagingTest = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    getLookupAttributeConditions() {
      axios
        .get("/api/attributeConditions")
        .then(result => {
          this.editedAttributeConditions = result.data.data;
        })
        .catch(err => {
          console.error(err);
        });
    },
    onSaveImagimgRequest() {
      let patientConditions = [];
      this.editedAttributeConditions.forEach(condition => {
        if (condition.isChecked) {
          patientConditions.push(condition.key);
        }
      });
      let imagingTests = [];
      this.editedAttributeImagingTest.forEach(test => {
        if (test.isChecked) {
          imagingTests.push(test.key);
        }
      });

      axios
        .post("/api/patients/addImagingRequest", {
          patientId: this.id,
          userId: this.loggedIn.user.id,
          provisionalDiagnosis: this.imaging.provisionalDiagnosis,
          clinicalInformation: this.imaging.clinicalInformation,
          patientConditions: patientConditions,
          examinationRequested: imagingTests,
          description: this.imaging.description,
          status: "CREATED"
        })
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.error(err);
        });
    },
    resetModal() {
      this.imagingRequestDialog = false;
      this.imaging.id = "";
      this.imaging.clinicalInformation = "";
      this.imaging.provisionalDiagnosis = "";
      this.imaging.createdAt = "";
      this.imaging.description = "";
      this.imaging.patientCondition = [];
      this.imaging.requestedExaminations = [];
      this.imaging.status = "";
      this.imaging.user = null;
      this.editedAttributeConditions.forEach(patientCondition => {
        patientCondition.isChecked = false;
      });
      this.editedAttributeImagingTest.forEach(imagingTest => {
        imagingTest.isChecked = false;
      });
    },
    getSelctedPatientConditions(condition) {
      this.editedAttributeConditions.forEach(patientCondition => {
        condition.forEach(condition => {
          if (patientCondition.key == condition) {
            return (patientCondition.isChecked = true);
          }
        });
      });
    },
    getSelctedimagingRequest(requestedExaminations) {
      this.editedAttributeImagingTest.forEach(imagingTest => {
        requestedExaminations.forEach(examination => {
          if (imagingTest.key == examination) {
            imagingTest.isChecked = true;
          }
        });
      });
    }
  },
  created() {
    this.getLookupAttributeImagingTests();
    this.getLookupAttributeConditions();
  }
};
</script>

<style>
</style>
