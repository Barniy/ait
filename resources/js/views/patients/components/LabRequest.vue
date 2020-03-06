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
                <v-col cols="12" sm="6" v-for="specimen in specimenType" :key="specimen.key">
                  <v-autocomplete
                    :items="specimen.attributeExaminationItems"
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
                  <v-radio-group row v-model="priority">
                    <v-radio value="0" label="STAT"></v-radio>
                    <v-radio value="1" label="Routine"></v-radio>
                    <v-radio value="3" label="Urgent"></v-radio>
                  </v-radio-group>
                </v-col>
              </v-row>
              <v-row>
                <v-col cols="12" sm="6" v-for="test in labType" :key="test.key">
                  <v-autocomplete
                    :items="test.attributeExaminationItems"
                    filled
                    chips
                    v-model="labTest"
                    item-text="description"
                    item-value="key"
                    :label="test.description"
                    multiple
                  ></v-autocomplete>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="labRequestDialog = false">Cancel</v-btn>
          <v-btn color="blue darken-1" text @click="labRequestDialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script>
export default {
  name: "LabRequest",
  data() {
    return {
      labRequestDialog: false,
      tests: [],
      labType: [],
      labTest: [],
      specimenType: [],
      specimenTest: [],
      priority: "0",
      note: ""
    };
  },
  methods: {
    remove(item) {},
    submit() {},
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
            type: "SPECIMENTTYPE"
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
