document.addEventListener("DOMContentLoaded", function () {
  const stepIds = [
    "step-personal-1",
    "step-personal-2",
    "step-address-phone",
    "step-passport",
    "step-travel",
    "step-travel-companions",
    "step-previous-us-travel",
    "step-us-contact",
    "step-relatives",
    "step-work-education-present",
    "step-work-education-previous",
    "step-work-education-additional",
    "step-security-part1",
    "step-security-part2",
    "step-security-part3",
    "step-security-part4",
    "step-security-part5",
    
  ];
let currentStep = 0;

const prevBtn = document.getElementById("prev-btn");
const nextBtn = document.getElementById("next-btn");

if (!prevBtn || !nextBtn) return;

function showStep(index) {
  stepIds.forEach((id, i) => {
    const el = document.getElementById(id);
    if (!el) return;

    if (i === index) {
      el.classList.remove("hidden");
    } else {
      el.classList.add("hidden");
    }
  });

  prevBtn.classList.toggle("hidden", index === 0);

  if (index === stepIds.length - 1) {
    nextBtn.innerHTML = `Finish <i class="bi bi-check-lg"></i>`;
    nextBtn.type = "button";
  } else {
    const nextLabel = stepIds[index + 1]?.replace("step-", "").replace(/-/g, " ");
    nextBtn.innerHTML = `Next: ${capitalizeWords(nextLabel)} <i class="bi bi-arrow-right"></i>`;
    nextBtn.type = "button";
  }

  if (index > 0) {
    const prevLabel = stepIds[index - 1]?.replace("step-", "").replace(/-/g, " ");
    prevBtn.innerHTML = `<i class="bi bi-arrow-left"></i> Back: ${capitalizeWords(prevLabel)}`;
  }
}

function capitalizeWords(str) {
  return str
    ? str.split(" ").map(w => w.charAt(0).toUpperCase() + w.slice(1)).join(" ")
    : "";
}

nextBtn.addEventListener("click", function (e) {
  e.preventDefault();

  if (currentStep < stepIds.length - 1) {
    currentStep++;
    showStep(currentStep);
  } else {
    alert("Application Submitted Successfully!");
    window.location.href = "/practice/dashboard.php";
  }
});



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
      toggleSection(yesSection, true);  
      toggleSection(noSection, false);  
    } else {
      toggleSection(yesSection, false); 
      toggleSection(noSection, true);   
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



const oldEmailYes = document.getElementById("old-email-yes");
  const oldEmailNo = document.getElementById("old-email-no");
  const oldEmailSection = document.getElementById("old-email-section");
  const emailContainer = document.getElementById("email-container");
  const addEmailBtn = document.getElementById("add-email-btn");
  const removeEmailBtn = document.getElementById("remove-email-btn");

  oldEmailYes.addEventListener("change", () => toggleSection(oldEmailSection, true));
  oldEmailNo.addEventListener("change", () => toggleSection(oldEmailSection, false));

  addEmailBtn.addEventListener("click", () => {
    const firstBlock = emailContainer.querySelector(".email-block");
    if (!firstBlock) return;
    const newBlock = firstBlock.cloneNode(true);

    newBlock.querySelectorAll("input").forEach(input => (input.value = ""));
    emailContainer.appendChild(newBlock);

    if (emailContainer.querySelectorAll(".email-block").length > 1) {
      removeEmailBtn.classList.remove("hidden");
    }
  });

  removeEmailBtn.addEventListener("click", () => {
    const blocks = emailContainer.querySelectorAll(".email-block");
    if (blocks.length > 1) {
      blocks[blocks.length - 1].remove();
    }
    if (emailContainer.querySelectorAll(".email-block").length <= 1) {
      removeEmailBtn.classList.add("hidden");
    }
  });

  toggleSection(oldEmailSection, oldEmailYes.checked);

  // ================= SOCIAL MEDIA =================
  const socialYes = document.getElementById("social-media-yes");
  const socialNo = document.getElementById("social-media-no");
  const socialSection = document.getElementById("social-media-section");
  const socialContainer = document.getElementById("social-media-container");
  const addSocialBtn = document.getElementById("add-social-btn");
  const removeSocialBtn = document.getElementById("remove-social-btn");

  socialYes.addEventListener("change", () => toggleSection(socialSection, true));
  socialNo.addEventListener("change", () => toggleSection(socialSection, false));

  addSocialBtn.addEventListener("click", () => {
    const firstBlock = socialContainer.querySelector(".social-media-block");
    if (!firstBlock) return;
    const newBlock = firstBlock.cloneNode(true);

    newBlock.querySelectorAll("input, select").forEach(el => (el.value = ""));
    socialContainer.appendChild(newBlock);

    if (socialContainer.querySelectorAll(".social-media-block").length > 1) {
      removeSocialBtn.classList.remove("hidden");
    }
  });

  removeSocialBtn.addEventListener("click", () => {
    const blocks = socialContainer.querySelectorAll(".social-media-block");
    if (blocks.length > 1) {
      blocks[blocks.length - 1].remove();
    }
    if (socialContainer.querySelectorAll(".social-media-block").length <= 1) {
      removeSocialBtn.classList.add("hidden");
    }
  });

  toggleSection(socialSection, socialYes.checked);

  // ================= OTHER SOCIAL =================
  const otherSocialYes = document.getElementById("other-social-yes");
  const otherSocialNo = document.getElementById("other-social-no");
  const otherSocialSection = document.getElementById("other-social-section");
  const otherSocialContainer = document.getElementById("other-social-container");
  const addOtherSocialBtn = document.getElementById("add-other-social-btn");
  const removeOtherSocialBtn = document.getElementById("remove-other-social-btn");

  otherSocialYes.addEventListener("change", () => toggleSection(otherSocialSection, true));
  otherSocialNo.addEventListener("change", () => toggleSection(otherSocialSection, false));

  addOtherSocialBtn.addEventListener("click", () => {
    const firstBlock = otherSocialContainer.querySelector(".other-social-block");
    if (!firstBlock) return;
    const newBlock = firstBlock.cloneNode(true);

    newBlock.querySelectorAll("input").forEach(input => (input.value = ""));
    otherSocialContainer.appendChild(newBlock);

    if (otherSocialContainer.querySelectorAll(".other-social-block").length > 1) {
      removeOtherSocialBtn.classList.remove("hidden");
    }
  });

  removeOtherSocialBtn.addEventListener("click", () => {
    const blocks = otherSocialContainer.querySelectorAll(".other-social-block");
    if (blocks.length > 1) {
      blocks[blocks.length - 1].remove();
    }
    if (otherSocialContainer.querySelectorAll(".other-social-block").length <= 1) {
      removeOtherSocialBtn.classList.add("hidden");
    }
  });

  toggleSection(otherSocialSection, otherSocialYes.checked);


const stolenyesRadio = document.getElementById('stolen-passport-yes');
const stolennoRadio = document.getElementById('stolen-passport-no');
const detailsSection1 = document.getElementById('stolen-passport-issue-details');
const addBtn = document.getElementById('add-section-btn');
const removeBtn = document.getElementById('remove-section-btn');

// Toggle the main details section
function toggleDetails() {
  toggleSection(detailsSection1, stolenyesRadio.checked);

  // Show/hide add/remove buttons
  addBtn.classList.toggle('hidden', !stolenyesRadio.checked);
  removeBtn.classList.add('hidden'); // hide remove on main section toggle

  // Remove any cloned extra sections if No is selected
  if (!stolenyesRadio.checked) {
    document.querySelectorAll('.stolen-passport-extra').forEach(el => el.remove());
  }
}

stolenyesRadio.addEventListener('change', toggleDetails);
stolennoRadio.addEventListener('change', toggleDetails);

// Add extra cloned section
addBtn.addEventListener('click', () => {
  const clone = detailsSection1.cloneNode(true);

  clone.id = ''; // remove duplicate id
  clone.classList.remove('hidden');
  clone.classList.add('stolen-passport-extra', 'mt-4');

  // Clear inputs in the cloned section
  clone.querySelectorAll('input, textarea, select').forEach(el => {
    if (el.tagName.toLowerCase() === 'select') {
      el.selectedIndex = 0;
    } else {
      el.value = '';
    }
  });

  // Remove the original button row in the clone
  const btnRow = clone.querySelector('.mt-4.flex.gap-4');
  if (btnRow) btnRow.remove();

  detailsSection1.insertAdjacentElement('afterend', clone);

  removeBtn.classList.remove('hidden');
  addBtn.classList.add('hidden');
});

// Remove all extra cloned sections
removeBtn.addEventListener('click', () => {
  document.querySelectorAll('.stolen-passport-extra').forEach(el => el.remove());
  removeBtn.classList.add('hidden');
  addBtn.classList.remove('hidden');
});

// Initialize on page load
toggleDetails();


const personCheckbox = document.getElementById('contact-does-not-know');
const orgCheckbox = document.getElementById('organization-does-not-know');

const personInputs = document.querySelectorAll('#Contact-check input[type="text"]');
const orgInputs = document.querySelectorAll('#Organization-check input[type="text"]');

personCheckbox.addEventListener('change', () => {
  if (personCheckbox.checked) {
    orgCheckbox.checked = false;

    personInputs.forEach(inp => { inp.value = ""; inp.disabled = true; });

    orgInputs.forEach(inp => { inp.disabled = false; });
  } else {
    personInputs.forEach(inp => { inp.disabled = false; });
  }
});

orgCheckbox.addEventListener('change', () => {
  if (orgCheckbox.checked) {
    personCheckbox.checked = false;

    orgInputs.forEach(inp => { inp.value = ""; inp.disabled = true; });

    personInputs.forEach(inp => { inp.disabled = false; });
  } else {
    orgInputs.forEach(inp => { inp.disabled = false; });
  }
});


const relationshipSelect = document.getElementById("relationship");
const usRelationAddress = document.getElementById("US-relation-addres");

relationshipSelect.addEventListener("change", () => {
  if (relationshipSelect.value !== "") {
    usRelationAddress.classList.remove("hidden");
  } else {
    usRelationAddress.classList.add("hidden");
  }
});
 
    const fatherYes = document.getElementById("live-father-yes");
    const fatherNo = document.getElementById("live-father-no");
    const fatherStatusContainer = document.getElementById("father-status-container");
    const fatherStatusSelect = document.getElementById("father-status-us");

    function togglefatherStatus() {
      if (fatherYes.checked) {
        fatherStatusContainer.classList.remove("hidden");
        fatherStatusSelect.setAttribute("required", "required");
      } else {
        fatherStatusContainer.classList.add("hidden");
        fatherStatusSelect.removeAttribute("required");
        fatherStatusSelect.value = "";
      }
    }

    fatherYes.addEventListener("change", togglefatherStatus);
    fatherNo.addEventListener("change", togglefatherStatus);


      const motherYes = document.getElementById("live-mother-yes");
    const motherNo = document.getElementById("live-mother-no");
    const motherStatusContainer = document.getElementById("mother-status-container");
    const motherStatusSelect = document.getElementById("mother-status-us");

    function togglemotherStatus() {
      if (motherYes.checked) {
        motherStatusContainer.classList.remove("hidden");
        motherStatusSelect.setAttribute("required", "required");
      } else {
        motherStatusContainer.classList.add("hidden");
        motherStatusSelect.removeAttribute("required");
        motherStatusSelect.value = "";
      }
    }

    motherYes.addEventListener("change", togglemotherStatus);
    motherNo.addEventListener("change", togglemotherStatus);
  
 


  const yesImmediate = document.getElementById('live-immediate-yes');
  const noImmediate = document.getElementById('live-immediate-no');
  const contactRelative = document.getElementById('Contact-check-relative');
  const otherRelative = document.getElementById('other-relative-details');

  const relativeContainer = document.getElementById('relative-container');
  const addRelativeBtn = document.getElementById('add-relative');

  function resetFirstBlock() {
    const first = relativeContainer.querySelector('.relative-block');
    if (!first) return;
    first.querySelectorAll('input').forEach(input => {
      if (input.type === 'checkbox') input.checked = false;
      else input.value = '';
    });
    first.querySelectorAll('select').forEach(s => s.value = '');
    const rm = first.querySelector('.remove-relative');
    if (rm) rm.classList.add('hidden');
  }

  function clearExtraBlocks() {
    const blocks = relativeContainer.querySelectorAll('.relative-block');
    blocks.forEach((b, i) => {
      if (i === 0) return; 
      b.remove();
    });
    resetFirstBlock();
  }

  function toggleImmediateRelative() {
    if (yesImmediate.checked) {
      contactRelative.classList.remove('hidden');
      otherRelative.classList.add('hidden');
    } else if (noImmediate.checked) {
      contactRelative.classList.add('hidden');
      otherRelative.classList.remove('hidden');
      clearExtraBlocks();
    }
  }

  yesImmediate.addEventListener('change', toggleImmediateRelative);
  noImmediate.addEventListener('change', toggleImmediateRelative);

  addRelativeBtn.addEventListener('click', function () {
    const firstBlock = relativeContainer.querySelector('.relative-block');
    if (!firstBlock) return;
    const newBlock = firstBlock.cloneNode(true);

    newBlock.querySelectorAll('input').forEach(input => {
      if (input.type === 'checkbox') input.checked = false;
      else input.value = '';
    });
    newBlock.querySelectorAll('select').forEach(s => s.value = '');

    const removeBtn = newBlock.querySelector('.remove-relative');
    if (removeBtn) removeBtn.classList.remove('hidden');

    if (removeBtn) {
      removeBtn.addEventListener('click', function () {
        newBlock.remove();
      });
    }

    relativeContainer.appendChild(newBlock);
  });

  relativeContainer.addEventListener('click', function (e) {
    if (e.target && e.target.matches('.remove-relative')) {
      const block = e.target.closest('.relative-block');
      if (block) block.remove();
    }
  });

  toggleImmediateRelative();

const clanYes = document.getElementById("clan-yes");
const clanNo = document.getElementById("clan-no");
const tribeSection = document.getElementById("tribe-section");

clanYes.addEventListener("change", () => {
  tribeSection.classList.remove("hidden");
});

clanNo.addEventListener("change", () => {
  tribeSection.classList.add("hidden");
});

const langaddBtn = document.getElementById("add-language");
const langcontainer = document.getElementById("languages-container");

langaddBtn.addEventListener("click", () => {
  const firstBlock = langcontainer.querySelector(".language-block");
  const newBlock = firstBlock.cloneNode(true);

  newBlock.querySelector("input").value = "";

  const removeBtn = newBlock.querySelector(".remove-btn");
  removeBtn.classList.remove("hidden");

  removeBtn.addEventListener("click", () => {
    newBlock.remove();
  });

  langcontainer.appendChild(newBlock);
});
const lastTravelYes = document.getElementById("last-travel-yes");
const lastTravelNo = document.getElementById("last-travel-no");
const travelContainer = document.getElementById("last-travel-container");
const countryaddBtn = document.querySelector("#add-last-travel"); 
const firstBlock = travelContainer.querySelector(".last-block");

travelContainer.style.display = "none";

lastTravelYes.addEventListener("change", () => {
  travelContainer.style.display = "block";
  countryaddBtn.style.display = "inline-block";
});

lastTravelNo.addEventListener("change", () => {
  travelContainer.style.display = "none";
  countryaddBtn.style.display = "none";
  const blocks = travelContainer.querySelectorAll(".language-block");
  blocks.forEach((block, index) => {
    if (index > 0) block.remove();
    else block.querySelector("select").value = "";
  });
});

countryaddBtn.addEventListener("click", () => {
  const newBlock = firstBlock.cloneNode(true);
  newBlock.querySelector("select").value = "";
  const removeBtn = newBlock.querySelector(".remove-btn");
  removeBtn.classList.remove("hidden");
  removeBtn.addEventListener("click", () => {
    newBlock.remove();
  });
  travelContainer.appendChild(newBlock);
});
const orgYesRadio = document.getElementById("social-organization-yes");
const orgNoRadio = document.getElementById("social-organization-no");
const orgContainer = document.getElementById("social-organization-container");
const orgAddBtn = document.getElementById("add-social-organization");
const orgFirstBlock = orgContainer.querySelector(".Organization-block");

// Initially hide
toggleSection(orgContainer, false);
orgAddBtn.classList.add("hidden");

// Show when YES selected
orgYesRadio.addEventListener("change", () => {
  toggleSection(orgContainer, true);
  orgAddBtn.classList.remove("hidden");
});

// Hide + reset when NO selected
orgNoRadio.addEventListener("change", () => {
  toggleSection(orgContainer, false);
  orgAddBtn.classList.add("hidden");

  const orgBlocks = orgContainer.querySelectorAll(".Organization-block");
  orgBlocks.forEach((block, index) => {
    if (index > 0) block.remove();
    else block.querySelector("input").value = "";
  });
});

// Add new organization block
orgAddBtn.addEventListener("click", () => {
  const newOrgBlock = orgFirstBlock.cloneNode(true);
  newOrgBlock.querySelector("input").value = "";

  const removeOrgBtn = newOrgBlock.querySelector(".remove-btn");
  removeOrgBtn.classList.remove("hidden");

  removeOrgBtn.addEventListener("click", () => {
    newOrgBlock.remove();
  });

  orgContainer.appendChild(newOrgBlock);
});

const militaryYes = document.getElementById("military-yes");
const militaryNo = document.getElementById("military-no");
const militaryContainer = document.getElementById("military-container");
const addMilitaryBtn = document.getElementById("add-military");
const firstMilitaryBlock = militaryContainer.querySelector(".military-block");

militaryContainer.style.display = "none";
addMilitaryBtn.style.display = "none";

militaryYes.addEventListener("change", () => {
  militaryContainer.style.display = "block";
  addMilitaryBtn.style.display = "inline-block";
});

militaryNo.addEventListener("change", () => {
  militaryContainer.style.display = "none";
  addMilitaryBtn.style.display = "none";

  const blocks = militaryContainer.querySelectorAll(".military-block");
  blocks.forEach((block, index) => {
    if (index > 0) block.remove();
    else {
      block.querySelectorAll("input").forEach(input => input.value = "");
    }
  });
});

addMilitaryBtn.addEventListener("click", () => {
  const newBlock = firstMilitaryBlock.cloneNode(true);
  newBlock.querySelectorAll("input").forEach(input => input.value = "");

  const removeBtn = newBlock.querySelector(".remove-btn");
  removeBtn.classList.remove("hidden");
  removeBtn.addEventListener("click", () => {
    newBlock.remove();
  });

  militaryContainer.appendChild(newBlock);
});


const occupationSelect = document.getElementById("primary-occupation");
const extraContainer = document.getElementById("occupation-extra");
const notEmployedSection = document.getElementById("not-employed-section");
const occupationInfoSection = document.getElementById("occupation-info-section");

occupationSelect.addEventListener("change", () => {
  const value = occupationSelect.value;

  notEmployedSection.classList.add("hidden");
  occupationInfoSection.classList.add("hidden");
  extraContainer.classList.add("hidden");

  if (!value) return;

  if (value === "retired") {
    extraContainer.classList.add("hidden");
  } 
  else if (value === "not_employed") {
    extraContainer.classList.remove("hidden");
    notEmployedSection.classList.remove("hidden");
  } 
  else {
    extraContainer.classList.remove("hidden");
    occupationInfoSection.classList.remove("hidden");
  }
});

document.getElementById('previous-employ-yes').addEventListener('change', () => {
  document.getElementById('previous-employ-container').classList.remove('hidden');
  if (!document.querySelector('#employment-list .employment-block')) {
    addEmploymentBlock();
  }
});

document.getElementById('previous-employ-no').addEventListener('change', () => {
  document.getElementById('previous-employ-container').classList.add('hidden');
  document.getElementById('employment-list').innerHTML = '';
});

document.getElementById('add-employment').addEventListener('click', addEmploymentBlock);

function addEmploymentBlock() {
  const template = document.getElementById('employment-template').firstElementChild.cloneNode(true);
  template.querySelector('.remove-employment').addEventListener('click', function() {
    this.closest('.employment-block').remove();
  });
  document.getElementById('employment-list').appendChild(template);
}
const yesEdu = document.getElementById('education-yes');
const noEdu = document.getElementById('education-no');
const eduSection = document.getElementById('education-section');
const addEduBtn = document.getElementById('add-education');
const eduTemplate = document.getElementById('education-template');

yesEdu.addEventListener('change', () => {
  eduSection.classList.remove('hidden');
  addEduBtn.classList.remove('hidden');
  if (eduSection.children.length === 0) addEducationEntry();
});

noEdu.addEventListener('change', () => {
  eduSection.classList.add('hidden');
  addEduBtn.classList.add('hidden');
  eduSection.innerHTML = '';
});

addEduBtn.addEventListener('click', addEducationEntry);

function addEducationEntry() {
  const clone = eduTemplate.firstElementChild.cloneNode(true);
  clone.querySelector('.remove-education').addEventListener('click', function () {
    this.closest('.education-entry').remove();
  });
  eduSection.appendChild(clone);
}

document.addEventListener("change", (e) => {
  if (e.target.classList.contains("state-toggle-checkbox")) {
    const block = e.target.closest(".state-toggle-block");
    const input = block.querySelector(".state-input");
    input.disabled = e.target.checked;
    if (e.target.checked) {
      input.value = "";
    }
  }
});


  showStep(currentStep);

});
