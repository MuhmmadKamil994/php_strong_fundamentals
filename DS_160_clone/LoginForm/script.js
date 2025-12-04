document.addEventListener("DOMContentLoaded", function () {
const stepIds = [
  "step-personal-1",
  "step-personal-2",
  "step-travel",
  "step-company",
  "step-address-phone",
  "step-security-part1",
  "step-security-part2",
  "step-security-part3",
  "step-security-part4",
  "step-security-part5",
  "step-photo",
  "step-sign",
  "step-review"  
];

const steps = stepIds.map(id => document.getElementById(id));
let currentStepIndex = 0;

let formData = {};

const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");
// ---------------- NAVIGATION CORE ----------------
function showStep(index) {
  steps.forEach((step, i) => {
    if (step) {
      const isVisible = i === index;
      step.classList.toggle("hidden", !isVisible);

      step.querySelectorAll("input, select, textarea").forEach(el => {
        if (isVisible) {
          if (el.dataset.wasRequired === "true") {
            el.setAttribute("required", "true");
          }
        } else {
          if (el.hasAttribute("required")) {
            el.dataset.wasRequired = "true"; // remember it
            el.removeAttribute("required");
          }
        }
      });
    }
  });

  currentStepIndex = index;

  const stepInput = document.getElementById("current_step");
  if (stepInput) stepInput.value = index;

  if (prevBtn) {
    if (index === 0) {
      prevBtn.classList.add("hidden");
    } else {
      prevBtn.classList.remove("hidden");
      prevBtn.textContent =
        "Back: " + stepIds[index - 1].replace("step-", "").replace(/-/g, " ");
    }
  }

  if (nextBtn) {
    if (index === steps.length - 1) {
      nextBtn.textContent = "Submit Application";
      nextBtn.type = "submit"; 
    } else {
      nextBtn.textContent =
        "Next: " +
        stepIds[index + 1].replace("step-", "").replace(/-/g, " ");
      nextBtn.type = "button";
    }
  }
}


// ---------------- SAVE CURRENT STEP DATA ----------------
function saveStepData(stepEl) {
  if (!stepEl) return;
  const inputs = stepEl.querySelectorAll("input, select, textarea");
  inputs.forEach((el) => {
    let key = el.name || el.id;
    if (!key) return;

    if (el.type === "radio") {
      if (el.checked) formData[key] = el.value;
    } else if (el.type === "checkbox") {
      formData[key] = el.checked ? el.value : "";
    } else {
      formData[key] = el.value;
    }
  });
}

// ---------------- VALIDATE CURRENT STEP ----------------
function validateStep(stepEl) {
  let valid = true;
  stepEl.querySelectorAll(".error-msg").forEach((el) => el.remove());
  stepEl.querySelectorAll("[required]").forEach((el) => {
    if (el.disabled) return; 
    if (el.type === "checkbox" || el.type === "radio") {
      const group = stepEl.querySelectorAll(
        `input[name="${el.name}"]:not(:disabled)`
      );
      const checked = Array.from(group).some((i) => i.checked);
      if (!checked) {
        valid = false;
        const span = document.createElement("span");
        span.className = "error-msg text-red-600 text-sm block";
        span.textContent = "Please select at least one option";
        el.insertAdjacentElement("afterend", span);
      }
    } else {
      if (!el.value || el.value === "Select One") {
        valid = false;
        const span = document.createElement("span");
        span.className = "error-msg text-red-600 text-sm block";
        span.textContent = "This field is required";
        el.insertAdjacentElement("afterend", span);
      }
    }
  });
  return valid;
}
// ---------------- BUTTON HANDLERS ----------------
if (prevBtn) {
  prevBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (currentStepIndex > 0) {
      showStep(currentStepIndex - 1);
    }
  });
}

if (nextBtn) {
  nextBtn.addEventListener("click", (e) => {
    e.preventDefault();

    const currentStepEl = steps[currentStepIndex];
    saveStepData(currentStepEl);

    if (!validateStep(currentStepEl)) return; 

    if (currentStepIndex < steps.length - 1) {
      showStep(currentStepIndex + 1);
    } else {
    
      console.log("Final collected data:", formData);

      const form = document.querySelector("#applicationForm"); 
      if (form) {
        for (const key in formData) {
          if (!form.querySelector(`[name="${key}"]`)) {
            const hidden = document.createElement("input");
            hidden.type = "hidden";
            hidden.name = key;
            hidden.value = formData[key];
            form.appendChild(hidden);
          }
        }
        form.submit();
      }
    }
  });
}
function toggleSection(section, show) {
  const el = (typeof section === 'string') ? document.getElementById(section) : section;
  if (!el) return; 
  el.classList.toggle('hidden', !show);
  el.querySelectorAll('input, select, textarea').forEach(control => {
    const tag = control.tagName.toLowerCase();
    const type = control.type;
    if (show) {
      control.disabled = false;
      if (control.dataset.originalRequired === 'true') control.required = true;
    } else {
      if (control.required && !control.dataset.originalRequired) {
        control.dataset.originalRequired = 'true';
      }
      control.required = false;
      control.disabled = true;
      if (type === 'checkbox' || type === 'radio') {
        control.checked = false;
      } else if (type === 'file') {
        control.value = null; 
      } else if (tag === 'select') {
        if (control.multiple) {
          Array.from(control.options).forEach(opt => (opt.selected = false));
        } else {
          control.selectedIndex = 0;
        }
      } else {
        control.value = '';
      }
    }
  });
}
stepIds.forEach(id => {
  if (!document.getElementById(id)) {
    console.warn("❌ Missing ID in HTML:", id);
  }
});
  let US_STATES = []; 

  fetch('U.S-state.json')
    .then(response => response.json())
    .then(states => {
      US_STATES = states;
      document.querySelectorAll('select.us-states').forEach(select => {
        populateStatesSelect(select);
      });
    })
    .catch(err => console.error('Error loading states list:', err));


function populateStatesSelect(select) {
  if (!select) return;
  select.innerHTML = '<option value="">--Select State--</option>';
  US_STATES.forEach(state => {
    const option = document.createElement('option');
    option.value = state.abbreviation;
    option.textContent = state.name;
    select.appendChild(option);
  });
}
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  tooltipTriggerList.forEach(el => new bootstrap.Tooltip(el));



  function populateCountries(selectId) {
    const select = document.getElementById(selectId);
    if (!select) return;
    fetch("https://restcountries.com/v3.1/all?fields=name")
      .then(res => res.json())
      .then(data => {
        const countries = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
        countries.forEach(c => {
          const option = document.createElement("option");
          option.textContent = c.name.common;
          select.appendChild(option);
        });
      });
  }

  ["birth-country","Employee-country","other-nationality-select","education-country","occupation-country","country-drop","Spouse-birth-country","Spouse-country","stolen-passport-issue-country","passport-issue-country","mailing-country","person-pay","Company-pay", "nationality","personal-country" ].forEach(populateCountries);

  document.querySelectorAll('.state-toggle-block').forEach(block => {
  const input = block.querySelector('.state-input');
  const checkbox = block.querySelector('.state-toggle-checkbox');

  checkbox.addEventListener('change', () => {
    input.disabled = checkbox.checked;
    if (checkbox.checked) {
      input.value = "";
    }
  });
});
function toggleSSNFields() {
  const parts = ["ssn-part1", "ssn-part2", "ssn-part3"].map(id => document.getElementById(id));
  const checkbox = document.getElementById("toggle-checkbox");

  function autoTabSSN() {
    parts.forEach((input, i, arr) => {
      input.addEventListener("input", () => {
        if (input.value.length === input.maxLength && i < arr.length - 1) {
          arr[i + 1].focus();
        }
      });
    });
  }

  function handleCheckboxToggle() {
    checkbox.addEventListener("change", () => {
      parts.forEach(input => {
        input.disabled = checkbox.checked;
        if (checkbox.checked) {
          input.value = ""; 
        }
      });
    });
  }

  autoTabSSN();
  handleCheckboxToggle();
}

toggleSSNFields();



  const otherNamesRadios = document.querySelectorAll('input[name="other-names"]');
  const otherNamesContainer = document.getElementById("other-names-container");
  const nameFieldsWrapper = document.getElementById("name-fields-wrapper");
  const addNameBtn = document.getElementById("add-name-btn");

  function addNameField() {
    const field = document.createElement("div");
    field.className = "flex space-x-4 mb-2 items-center";
    field.innerHTML = `
      <div>
        <label class="block text-xs">Other Surnames Used</label>
        <input type="text" class="form-control form-control-sm" required />
      </div>
      <div>
        <label class="block text-xs">Other Given Names Used</label>
        <input type="text" class="form-control form-control-sm" required />
      </div>
      <button type="button" class="btn btn-danger btn-sm remove-name-btn">Remove</button>
    `;
    field.querySelector(".remove-name-btn").addEventListener("click", () => field.remove());
    nameFieldsWrapper.appendChild(field);
  }
otherNamesRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    if (radio.value === "yes") {
      toggleSection(otherNamesContainer, true);
      if (nameFieldsWrapper.children.length === 0) {
        addNameField();
      }
    } else {
      toggleSection(otherNamesContainer, false);
      nameFieldsWrapper.innerHTML = "";
    }
  });
});

  addNameBtn.addEventListener("click", addNameField);

  const telecodeRadios = document.querySelectorAll('input[name="telecode-names"]');
  const telecodeFields = document.getElementById("telecode-fields");
telecodeRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    if (radio.value === "yes" && radio.checked) {
      toggleSection(telecodeFields, true);
    } else if (radio.value === "no" && radio.checked) {
      // ✅ Hide section and disable inputs
      toggleSection(telecodeFields, false);
    }
  });

  // Run once on page load (in case "Yes" is pre-checked)
  if (radio.value === "yes" && radio.checked) {
    toggleSection(telecodeFields, true);
  }
  if (radio.value === "no" && radio.checked) {
    toggleSection(telecodeFields, false);
  }
});

const otherNationalityRadios = document.querySelectorAll('input[name="other-nationality"]');
const sectionnationality = document.getElementById("other-nationality-section");
const select = document.getElementById("other-nationality-select");
const passportQ = document.getElementById("passport-question");
const passportNum = document.getElementById("passport-number");
const passportRadios = passportQ.querySelectorAll('input[name="passport-held"]');

otherNationalityRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    sectionnationality.classList.toggle("hidden", radio.value !== "yes");
    if (radio.value !== "yes") {
      select.value = "";
      passportQ.classList.add("hidden");
      passportNum.classList.add("hidden");
    }
  });
});

select.addEventListener("change", () => {
  passportQ.classList.toggle("hidden", select.value === "");
  passportNum.classList.add("hidden");
  passportRadios.forEach(r => r.checked = false);
});

passportRadios.forEach(radio => {
  radio.addEventListener("change", () => {
    passportNum.classList.toggle("hidden", radio.value !== "yes");
  });
});


  const otherPermanentRadios = document.querySelectorAll('input[name="other_permanent"]');
  const otherPermanentContainer = document.getElementById("other-permanent-container");
  const addPermanentBtn = document.getElementById("add-other-permanent-btn");
  const permanentFieldsWrapper = document.getElementById("permanent-fields-wrapper");

  let countryList = [];

  fetch("https://restcountries.com/v3.1/all?fields=name")
    .then(res => res.json())
    .then(data => {
      countryList = data.sort((a, b) => a.name.common.localeCompare(b.name.common));
    });

  function createPermanentBlock() {
    const block = document.createElement("div");
    block.className = "border p-4 rounded bg-gray-100 relative space-y-3";
    block.innerHTML = `
      <div>
        <label class="block font-semibold mb-1">Other Permanent Resident Country/Region:</label>
        <select class="w-full border rounded px-3 py-2">
          <option value="">Select One</option>
          ${countryList.map(c => `<option>${c.name.common}</option>`).join("")}
        </select>
      </div>
      <button type="button" class="absolute top-2 right-2 text-red-600 hover:text-red-800 remove-permanent-btn">✕ Remove</button>
    `;

    permanentFieldsWrapper.appendChild(block);
    block.querySelector(".remove-permanent-btn").addEventListener("click", () => block.remove());
  }

  otherPermanentRadios.forEach(radio => {
    radio.addEventListener("change", () => {
      if (radio.value === "yes") {
        otherPermanentContainer.classList.remove("hidden");
        if (permanentFieldsWrapper.children.length === 0) createPermanentBlock();
      } else {
        otherPermanentContainer.classList.add("hidden");
        permanentFieldsWrapper.innerHTML = "";
      }
    });
  });

  addPermanentBtn.addEventListener("click", createPermanentBlock);
  const specifyOptions = {
  "A": ["Ambassador or Public Minister (A1)", "Child of an A1 (A1)"],
  "B": ["Business & Tourism (B1/B2)", "Business/Conference (B1)", "Tourism/Medical Treatment (B2)"],
  "F": ["Academic Student (F1)", "Child of F1 (F2)", "Spouse of F1 (F2)"],
  "M": ["Vocational Student (M1)", "Child of M1 (M2)", "Spouse of M1 (M2)"],
  "J": ["Exchange Visitor (J1)", "Child of J1 (J2)", "Spouse of J1 (J2)"],
  "H": ["Specialty Occupation Worker (H1B)", "Spouse/Child of H (H4)"],
  "L": ["Intracompany Transferee (L1)", "Spouse/Child of L (L2)"],
  "O": ["Extraordinary Ability (O1)", "Spouse/Child of O (O3)"],
  "P": ["Athlete/Entertainer (P1)", "Spouse/Child of P (P4)"],
  "R": ["Religious Worker (R1)"],
  "E": ["Treaty Trader (E1)", "Treaty Investor (E2)"],
  "C/D": ["Transit (C1)", "Crewmember (D)", "Combined Transit/Crewmember (C1/D)"],
  "K": ["Fiancé(e) of U.S. Citizen (K1)", "Spouse of U.S. Citizen (K3)"],
  "Q": ["Cultural Exchange Visitor (Q1)"],
  "SPECIAL": ["Victim of Human Trafficking (T)", "Victim of Criminal Activity (U)", "Witness or Informant (S)", "Spouse/Child of LPR (V)"]
};

function bindPurposeChange(purposeSelect) {
  const block = purposeSelect.closest('.purpose-specify-block');
  const specifySelect = block.querySelector('.specify');

  purposeSelect.addEventListener('change', function() {
    const selectedValue = this.value;
    specifySelect.innerHTML = '<option value="">--Select Specify--</option>';

    if (specifyOptions[selectedValue]) {
      specifyOptions[selectedValue].forEach(function(opt) {
        const option = document.createElement('option');
        option.value = opt;
        option.textContent = opt;
        specifySelect.appendChild(option);
      });
    }
  });
}

document.querySelectorAll('.purpose').forEach(purposeSelect => {
  bindPurposeChange(purposeSelect);
});

document.getElementById('add-purpose-specify').addEventListener('click', function() {
  const container = document.getElementById('purpose-specify-container');
  const firstBlock = container.querySelector('.purpose-specify-block');
  const newBlock = firstBlock.cloneNode(true);

  const newPurposeSelect = newBlock.querySelector('.purpose');
  const newSpecifySelect = newBlock.querySelector('.specify');
  newPurposeSelect.value = '';
  newSpecifySelect.innerHTML = '<option value="">--Select Specify--</option>';

  const removeBtn = newBlock.querySelector('.remove-btn');
  removeBtn.classList.remove('hidden');

  bindPurposeChange(newPurposeSelect);

  removeBtn.addEventListener('click', function() {
    newBlock.remove();
  });

  container.appendChild(newBlock);
});

document.querySelectorAll('.remove-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    this.closest('.purpose-specify-block').remove();
  });
});

  document.querySelectorAll('input[name="travel-plans"]').forEach(radio => {
  radio.addEventListener('change', function () {
    const yesSection = document.getElementById('travel-plans-wrapper');
    const noSection = document.getElementById('no-travel-plans-wrapper');
    if (radio.value === "yes") {
      toggleSection(yesSection, true);   // ✅ required in Yes
      toggleSection(noSection, false);  // ❌ disable No fields
    } else {
      toggleSection(yesSection, false); // ❌ disable Yes fields
      toggleSection(noSection, true);   // ✅ required in No
    }
  });
});




  const addLocationBtn = document.getElementById("add-location-btn");
  const locationsContainer = document.getElementById("locations-container");

  addLocationBtn.addEventListener("click", () => {
    const locationItem = document.createElement("div");
    locationItem.className = "location-item flex items-center gap-2";

    locationItem.innerHTML = `
      <input
        type="text"
        name="locations[]"
        class="w-full border rounded px-3 py-2"
        placeholder="Enter location"
        required
      />
      <button type="button" class="remove-btn text-red-500 font-bold">X</button>
    `;

    locationsContainer.appendChild(locationItem);
  });

  locationsContainer.addEventListener("click", (e) => {
    if (e.target.classList.contains("remove-btn")) {
      e.target.parentElement.remove();
    }
  });


 const stayLengthInput = document.getElementById('stay-length');
    const stayTimeSelect = document.getElementById('stay-time');
    const addressSection = document.getElementById('address-section');

    function checkLengthOfStay() {
      const lengthValue = stayLengthInput.value.trim();
      const timeValue = stayTimeSelect.value;

      if (lengthValue !== "" && timeValue !== "") {
        addressSection.classList.remove('hidden');
      } else {
        addressSection.classList.add('hidden');
      }
    }

    stayLengthInput.addEventListener('input', checkLengthOfStay);
    stayTimeSelect.addEventListener('change', checkLengthOfStay);
  
     const tripPayerSelect = document.getElementById('trip-payer');
  const otherPersonSection = document.getElementById('other-person-section');
  const organizationSection = document.getElementById('organization-section');

  tripPayerSelect.addEventListener('change', function() {
      toggleSection(otherPersonSection, false);
  toggleSection(organizationSection, false);

  if (this.value === 'OP') {
    toggleSection(otherPersonSection, true);
  } else if (this.value === 'OC') {
    toggleSection(organizationSection, true);
  }
  });
  const yesRadio = document.querySelector('input[name="same-address"][value="yes"]');
const noRadio = document.querySelector('input[name="same-address"][value="no"]');
const companyAddressSection = document.getElementById('address-section-company');

function toggleCompanyAddress() {
  toggleSection(companyAddressSection, noRadio.checked);
}

yesRadio.addEventListener('change', toggleCompanyAddress);
noRadio.addEventListener('change', toggleCompanyAddress);

const travelingRadios = document.querySelectorAll('input[name="traveling"]');
const groupTravelSection = document.getElementById('group-travel-section');

const groupTravelRadios = document.querySelectorAll('input[name="group-travel"]');
const groupNameSection = document.getElementById('group-name-section');
const individualTravelersSection = document.getElementById('individual-travelers-section');

// Main travel radio (Are you traveling with a group?)
travelingRadios.forEach(radio => {
  radio.addEventListener('change', function() {
    if (this.value === 'yes') {
      toggleSection(groupTravelSection, true);
      toggleSection(groupNameSection, false);
      toggleSection(individualTravelersSection, false);

      // reset any previous selection
      groupTravelRadios.forEach(r => r.checked = false);
    } else {
      toggleSection(groupTravelSection, false);
      toggleSection(groupNameSection, false);
      toggleSection(individualTravelersSection, false);
    }
  });
});

// Nested group travel radio (Is it an organized group?)
groupTravelRadios.forEach(radio => {
  radio.addEventListener('change', function() {
    if (this.value === 'yes') {
      toggleSection(groupNameSection, true);
      toggleSection(individualTravelersSection, false);
    } else if (this.value === 'no') {
      toggleSection(individualTravelersSection, true);
      toggleSection(groupNameSection, false);
    }
  });
});

const previousTravelingRadios = document.querySelectorAll('input[name="previous-traveling"]');
const arrivalStayContainer = document.getElementById('arrival-stay-container');
const addArrivalStayBtn = document.getElementById('add-arrival-stay');

previousTravelingRadios.forEach(radio => {
  radio.addEventListener('change', function() {
    toggleSection(arrivalStayContainer, this.value === 'yes');
  });
});


// document.querySelectorAll('input[name="previous-traveling"]').forEach(radio => {
//   radio.addEventListener('change', function() {
//     const container = document.getElementById('arrival-stay-container');
//     if (this.value === 'yes') {
//       container.classList.remove('hidden');
//     } else {
//       container.classList.add('hidden');
//     }
//   });
// });

// document.getElementById('add-arrival-stay-btn').addEventListener('click', function() {
//   const container = document.getElementById('arrival-stay-container');
//   const firstBlock = container.querySelector('.arrival-stay-block');
//   const newBlock = firstBlock.cloneNode(true);

//   newBlock.querySelectorAll('input').forEach(input => input.value = '');
//   newBlock.querySelector('select').value = '';

//   newBlock.querySelector('.remove-arrival-btn').classList.remove('hidden');

//   newBlock.querySelector('.remove-arrival-btn').addEventListener('click', function() {
//     newBlock.remove();
//   });

//   container.insertBefore(newBlock, document.getElementById('add-arrival-stay-btn'));
// });

// document.querySelectorAll('.remove-arrival-btn').forEach(btn => {
//   btn.addEventListener('click', function() {
//     this.closest('.arrival-stay-block').remove();
//   });
// });


// document.querySelectorAll('input[name="driving-License"]').forEach(radio => {
//   radio.addEventListener('change', function() {
//     const licenseContainer = document.getElementById('drivers-license-container');
//     if (this.value === 'yes') {
//       licenseContainer.classList.remove('hidden');
//     } else {
//       licenseContainer.classList.add('hidden');
//     }
//   });
// });

// document.getElementById('add-license-btn').addEventListener('click', function() {
//   const container = document.getElementById('drivers-license-container');
//   const firstBlock = container.querySelector('.license-block');
//   const newBlock = firstBlock.cloneNode(true);

//   newBlock.querySelectorAll('input').forEach(input => input.value = '');
//   newBlock.querySelector('select').value = '';

//   newBlock.querySelector('.remove-license-btn').classList.remove('hidden');

//   newBlock.querySelector('.remove-license-btn').addEventListener('click', function() {
//     newBlock.remove();
//   });

//   container.insertBefore(newBlock, document.getElementById('add-license-btn'));
// });

// document.querySelectorAll('.remove-license-btn').forEach(btn => {
//   btn.addEventListener('click', function() {
//     this.closest('.license-block').remove();
//   });
// });
  
//     const visaIssueRadios = document.querySelectorAll('input[name="visa-issue"]');
//     const visaInfoContainer = document.getElementById('visa-information-container');

//     visaIssueRadios.forEach(radio => {
//       radio.addEventListener('change', function () {
//         if (this.value === 'yes') {
//           visaInfoContainer.classList.remove('hidden');
//         } else {
//           visaInfoContainer.classList.add('hidden');
//         }
//       });
//     });
// --- Previous Traveling ---
document.querySelectorAll('input[name="previous-traveling"]').forEach(radio => {
  radio.addEventListener('change', function() {
    toggleSection(document.getElementById('arrival-stay-container'), this.value === 'yes');
  });
});

// Add new arrival stay block
document.getElementById('add-arrival-stay-btn').addEventListener('click', function() {
  const container = document.getElementById('arrival-stay-container');
  const firstBlock = container.querySelector('.arrival-stay-block');
  const newBlock = firstBlock.cloneNode(true);

  // reset values
  newBlock.querySelectorAll('input').forEach(input => input.value = '');
  newBlock.querySelector('select').value = '';

  // show and attach remove button
  const removeBtn = newBlock.querySelector('.remove-arrival-btn');
  removeBtn.classList.remove('hidden');
  removeBtn.addEventListener('click', () => newBlock.remove());

  container.insertBefore(newBlock, document.getElementById('add-arrival-stay-btn'));
});

// Attach remove logic for existing arrival stay blocks
document.querySelectorAll('.remove-arrival-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    this.closest('.arrival-stay-block').remove();
  });
});


// --- Driving License ---
document.querySelectorAll('input[name="driving-License"]').forEach(radio => {
  radio.addEventListener('change', function() {
    toggleSection(document.getElementById('drivers-license-container'), this.value === 'yes');
  });
});

// Add new license block
document.getElementById('add-license-btn').addEventListener('click', function() {
  const container = document.getElementById('drivers-license-container');
  const firstBlock = container.querySelector('.license-block');
  const newBlock = firstBlock.cloneNode(true);

  // reset values
  newBlock.querySelectorAll('input').forEach(input => input.value = '');
  newBlock.querySelector('select').value = '';

  // show and attach remove button
  const removeBtn = newBlock.querySelector('.remove-license-btn');
  removeBtn.classList.remove('hidden');
  removeBtn.addEventListener('click', () => newBlock.remove());

  container.insertBefore(newBlock, document.getElementById('add-license-btn'));
});

// Attach remove logic for existing license blocks
document.querySelectorAll('.remove-license-btn').forEach(btn => {
  btn.addEventListener('click', function() {
    this.closest('.license-block').remove();
  });
});


// --- Visa Information ---
const visaIssueRadios = document.querySelectorAll('input[name="visa-issue"]');
const visaInfoContainer = document.getElementById('visa-information-container');

visaIssueRadios.forEach(radio => {
  radio.addEventListener('change', function () {
    toggleSection(visaInfoContainer, this.value === 'yes');
  });
});

  
 const yesClick = document.getElementById("visa-stolen-yes");
    const noClick = document.getElementById("visa-stolen-no");
    const detailsSection = document.getElementById("visa-stolen-details");

    yesClick.addEventListener("change", () => {
      if (yesClick.checked) {
        detailsSection.classList.remove("hidden");
      }
    });

    noClick.addEventListener("change", () => {
      if (noClick.checked) {
        detailsSection.classList.add("hidden");
      }
    });
  const mailyesClick = document.getElementById("personal-mail-yes");
    const mailnoClick = document.getElementById("personal-mail-no");
    const MaildetailsSection = document.getElementById("personal-mail-details");

  mailyesClick.addEventListener("change", () => {
  toggleSection(MaildetailsSection, false); 
});

mailnoClick.addEventListener("change", () => {
  toggleSection(MaildetailsSection, true); 
});

document.addEventListener("DOMContentLoaded", () => {
  if (mailnoClick.checked) {
    toggleSection(MaildetailsSection, true);
  } else {
    toggleSection(MaildetailsSection, false);
  }
});
  const numberyesClick = document.getElementById("old-number-yes");
const numbernoClick = document.getElementById("old-number-no");
const numberdetailsSection = document.getElementById("old-number-section");

const addPhoneBtn = document.getElementById("add-phone-btn");
const removePhoneBtn = document.getElementById("remove-phone-btn");
const phoneContainer = document.getElementById("phone-container");


numberyesClick.addEventListener("change", () => {
  toggleSection(numberdetailsSection, true);
});

numbernoClick.addEventListener("change", () => {
  toggleSection(numberdetailsSection, false);
});
 toggleSection(numberdetailsSection, numberyesClick.checked);
addPhoneBtn.addEventListener("click", () => {
  const firstBlock = phoneContainer.querySelector(".phone-block");
  const newBlock = firstBlock.cloneNode(true);

  newBlock.querySelector("input").value = "";

  phoneContainer.appendChild(newBlock);

  if (phoneContainer.querySelectorAll(".phone-block").length > 1) {
    removePhoneBtn.classList.remove("hidden");
  }
});

removePhoneBtn.addEventListener("click", () => {
  const blocks = phoneContainer.querySelectorAll(".phone-block");
  if (blocks.length > 1) {
    blocks[blocks.length - 1].remove();
  }

  if (phoneContainer.querySelectorAll(".phone-block").length === 1) {
    removePhoneBtn.classList.add("hidden");
  }
});

function setupToggle(questionName, showValue, detailsDivId) {
  const radios = document.querySelectorAll(`input[name="${questionName}"]`);
  const detailsDiv = document.getElementById(detailsDivId);

  if (!radios.length || !detailsDiv) return;

  radios.forEach(radio => {
    radio.addEventListener("change", () => {
      if (radio.value === showValue && radio.checked) {
        detailsDiv.classList.remove("hidden");
      } else {
        detailsDiv.classList.add("hidden");
      }
    });
  });
}
// Security Part 1
setupToggle("health-issue", "yes", "health-issue-details");
setupToggle("physical-disorder", "yes", "physical-disorder-details");
setupToggle("drug-abuse", "yes", "drug-abuse-details");

// Security Part 2
setupToggle("crime-doer", "yes", "crime-doer-details");
setupToggle("violation", "yes", "violation-details");
setupToggle("unlawful-act", "yes", "unlawful-act-details");
setupToggle("money-laundering", "yes", "money-laundering-details");
setupToggle("human-trafficking", "yes", "human-trafficking-details");
setupToggle("criminal", "yes", "criminal-details");
setupToggle("criminal-daughter", "yes", "criminal-daughter-details");

// Security Part 3
setupToggle("sabotage", "yes", "sabotage-details");
setupToggle("terrorist-activities", "yes", "terrorist-activities-details");
setupToggle("terrorist-organizations", "yes", "terrorist-organizations-details");
setupToggle("representative", "yes", "representative-details");
setupToggle("dumy1", "yes", "demo1-details");
setupToggle("dumy2", "yes", "demo2-details");
setupToggle("dumy3", "yes", "demo3-details");
setupToggle("dumy4", "yes", "demo4-details");
setupToggle("dumy5", "yes", "demo5-details");
setupToggle("dumy6", "yes", "demo6-details");
setupToggle("dumy7", "yes", "demo7-details");
setupToggle("dumy8", "yes", "demo8-details");

// Security Part 4
setupToggle("fraud-visa", "yes", "fraud-visa-details");
setupToggle("deportion", "yes", "deportion-details");

// Security Part 5
setupToggle("citizer-child", "yes", "citizer-child-details");
setupToggle("vote-violation", "yes", "vote-violation-details");
setupToggle("avoiding-taxation", "yes", "avoiding-taxation-details");


const uploadBtn = document.getElementById('uploadBtn');
const photoInput = document.getElementById('photoInput');
const previewContainer = document.getElementById('previewContainer');
const photoCanvas = document.getElementById('photoCanvas');
const errorPopup = document.getElementById('errorPopup');
const closePopup = document.getElementById('closePopup');
const errorPopupMsg = document.getElementById('errorPopupMsg');
function uploadToServer(base64Image) {
  fetch("../backend/upload_photo.php", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ photo: base64Image })
  })
  .then(res => res.json())
  .then(data => {
    if (data.status === "success") {
      console.log("Photo uploaded:", data.filePath);

      // Store path in hidden input so it gets submitted with the form
      let hiddenInput = document.getElementById("photoPathInput");
      if (!hiddenInput) {
        hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = "photo_path";
        hiddenInput.id = "photoPathInput";
        document.getElementById("dsform").appendChild(hiddenInput);
      }
      hiddenInput.value = data.filePath;
    } else {
      showErrorPopup("Upload failed: " + data.message);
    }
  })
  .catch(err => {
    console.error("Upload error:", err);
    showErrorPopup("An error occurred while uploading the photo.");
  });
}

const MAX_FILE_SIZE_KB = 200; 
const CANVAS_SIZE = 200;
let uploadedFileIdentifier = null; 
// Show error popup
function showErrorPopup(message) {
  errorPopupMsg.textContent = message;
  errorPopup.classList.remove('hidden');
}

// Close popup
closePopup.addEventListener('click', () => {
  errorPopup.classList.add('hidden');
});

// Trigger hidden file input
uploadBtn.addEventListener('click', () => photoInput.click());

// Handle file selection
photoInput.addEventListener('change', () => {
  const file = photoInput.files[0];
  if (!file) return;

  // File type check
  if (!file.type.startsWith('image/')) {
    showErrorPopup("Please upload a valid image file (jpg, png, etc.)");
    photoInput.value = "";
    return;
  }

  // File size check
  const fileSizeKB = file.size / 1024;
  if (fileSizeKB > MAX_FILE_SIZE_KB) {
    showErrorPopup(`File too large! Max size: ${MAX_FILE_SIZE_KB} KB`);
    photoInput.value = "";
    return;
  }

  // Duplicate check using name + size
  const fileIdentifier = file.name + '-' + file.size;
  if (uploadedFileIdentifier === fileIdentifier) {
    showErrorPopup("You are trying to upload the same image again!");
    photoInput.value = "";
    return;
  }

  const reader = new FileReader();
  reader.onload = function(e) {
    const img = new Image();
    img.onload = function() {
      const ctx = photoCanvas.getContext('2d');
      photoCanvas.width = CANVAS_SIZE;
      photoCanvas.height = CANVAS_SIZE;

      const scale = Math.min(CANVAS_SIZE / img.width, CANVAS_SIZE / img.height);
      const x = (CANVAS_SIZE - img.width * scale) / 2;
      const y = (CANVAS_SIZE - img.height * scale) / 2;
      ctx.clearRect(0, 0, CANVAS_SIZE, CANVAS_SIZE);
      ctx.drawImage(img, x, y, img.width * scale, img.height * scale);

      previewContainer.classList.remove('hidden');
      uploadedFileIdentifier = fileIdentifier;

      const base64Image = photoCanvas.toDataURL("image/jpeg", 0.9);
      uploadToServer(base64Image);

      photoInput.value = "";
    };
    img.src = e.target.result;
  };
  reader.readAsDataURL(file);
});

function populateReview() {
  const reviewContent = document.getElementById("reviewContent");
  if (!reviewContent) return;

  // Collect form data
  const formData = new FormData(document.querySelector("form"));
  let html = `<table class="table-auto border border-gray-300 w-full">`;

  formData.forEach((value, key) => {
    html += `
      <tr>
        <th class="border px-2 py-1 bg-gray-100 text-left">${key}</th>
        <td class="border px-2 py-1">${value}</td>
      </tr>
    `;
  });

  html += `</table>`;
  reviewContent.innerHTML = html;
}
const printBtn = document.getElementById("printReviewBtn");
  if (printBtn) {
    printBtn.addEventListener("click", () => {
      const reviewEl = document.getElementById("reviewContent");
      if (!reviewEl) return;

      const content = reviewEl.innerHTML;
      const printWindow = window.open("", "", "width=900,height=700");

      printWindow.document.write(`
        <html>
          <head>
            <title>DS-160 Review</title>
            <style>
              body { padding:20px; font-family:Arial,sans-serif; }
              h2 { text-align:center; margin-bottom:20px; color:#4f46e5; }
              table { width:100%; border-collapse:collapse; }
              th, td { border:1px solid #000; padding:8px; text-align:left; }
              th { background:#f9fafb; }
            </style>
          </head>
          <body>
            <h2>Application Review</h2>
            ${content}
          </body>
        </html>
      `);

      printWindow.document.close();
      printWindow.focus();
      printWindow.print();
      printWindow.close();
    });
  }
const popupEl = document.getElementById("review-popup");
const popupReviewBtn = document.getElementById("popup-review-btn");
const popupContinueBtn = document.getElementById("popup-continue-btn");
let cameFromReview = false;
function showReviewPopup() {
  if (!popupEl) return;
  popupEl.classList.remove("hidden", "opacity-0");
  popupEl.classList.add("flex");
}
if (popupReviewBtn) {
  popupReviewBtn.addEventListener("click", () => {
    popupEl.classList.add("hidden");
    cameFromReview = false;
    showStep(REVIEW_INDEX);  
    renderReview();          
  });
}

if (popupContinueBtn) {
  popupContinueBtn.addEventListener("click", () => {
    popupEl.classList.add("hidden");
    cameFromReview = false;

    const nextIndex = currentStepIndex + 1;

    if (nextIndex === REVIEW_INDEX) {
      renderReview();
    }

    showStep(nextIndex);
  });
}
const reviewBtn = document.getElementById("submitReviewBtn");
const REVIEW_INDEX = stepIds.indexOf("step-review");
function renderReview() {
  const reviewEl = document.getElementById("reviewContent"); 
  if (!reviewEl) return;

  let html = "<table class='w-full text-sm border-collapse'>";
  html += "<thead><tr><th class='border px-2 py-1 bg-gray-100'>Field</th><th class='border px-2 py-1 bg-gray-100'>Value</th></tr></thead>";
  html += "<tbody>";

  for (const key in formData) {
    html += `
      <tr>
        <td class="border px-2 py-1 font-medium">${key}</td>
        <td class="border px-2 py-1">${formData[key] || "<em>Not Provided</em>"}</td>
      </tr>
    `;
  }

  html += "</tbody></table>";
  reviewEl.innerHTML = html; 
}

if (reviewBtn) {
  reviewBtn.addEventListener("click", () => {
    saveStepData(steps[currentStepIndex]);
    renderReview();
    if (typeof REVIEW_INDEX !== "undefined" && REVIEW_INDEX >= 0) {
      showStep(REVIEW_INDEX);
    } else {
      console.warn("Review step not found in stepIds");
    }
  });
}
  showStep(0);
});
