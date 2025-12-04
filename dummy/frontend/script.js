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
// Photo section 
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
// Review section 
// function populateReview() {
//   const reviewContent = document.getElementById("reviewContent");
//   if (!reviewContent) return;

//   // Collect form data
//   const formData = new FormData(document.querySelector("form"));
//   let html = `<table class="table-auto border border-gray-300 w-full">`;

//   formData.forEach((value, key) => {
//     html += `
//       <tr>
//         <th class="border px-2 py-1 bg-gray-100 text-left">${key}</th>
//         <td class="border px-2 py-1">${value}</td>
//       </tr>
//     `;
//   });

//   html += `</table>`;
//   reviewContent.innerHTML = html;
// }
// const printBtn = document.getElementById("printReviewBtn");
//   if (printBtn) {
//     printBtn.addEventListener("click", () => {
//       const reviewEl = document.getElementById("reviewContent");
//       if (!reviewEl) return;

//       const content = reviewEl.innerHTML;
//       const printWindow = window.open("", "", "width=900,height=700");

//       printWindow.document.write(`
//         <html>
//           <head>
//             <title>DS-160 Review</title>
//             <style>
//               body { padding:20px; font-family:Arial,sans-serif; }
//               h2 { text-align:center; margin-bottom:20px; color:#4f46e5; }
//               table { width:100%; border-collapse:collapse; }
//               th, td { border:1px solid #000; padding:8px; text-align:left; }
//               th { background:#f9fafb; }
//             </style>
//           </head>
//           <body>
//             <h2>Application Review</h2>
//             ${content}
//           </body>
//         </html>
//       `);

//       printWindow.document.close();
//       printWindow.focus();
//       printWindow.print();
//       printWindow.close();
//     });
//   }
// const popupEl = document.getElementById("review-popup");
// const popupReviewBtn = document.getElementById("popup-review-btn");
// const popupContinueBtn = document.getElementById("popup-continue-btn");
// let cameFromReview = false;
// function showReviewPopup() {
//   if (!popupEl) return;
//   popupEl.classList.remove("hidden", "opacity-0");
//   popupEl.classList.add("flex");
// }
// if (popupReviewBtn) {
//   popupReviewBtn.addEventListener("click", () => {
//     popupEl.classList.add("hidden");
//     cameFromReview = false;
//     showStep(REVIEW_INDEX);  
//     renderReview();          
//   });
// }

// if (popupContinueBtn) {
//   popupContinueBtn.addEventListener("click", () => {
//     popupEl.classList.add("hidden");
//     cameFromReview = false;

//     const nextIndex = currentStepIndex + 1;

//     if (nextIndex === REVIEW_INDEX) {
//       renderReview();
//     }

//     showStep(nextIndex);
//   });
// }
// const reviewBtn = document.getElementById("submitReviewBtn");
// const REVIEW_INDEX = stepIds.indexOf("step-review");
// function renderReview() {
//   const reviewEl = document.getElementById("reviewContent"); 
//   if (!reviewEl) return;

//   let html = "<table class='w-full text-sm border-collapse'>";
//   html += "<thead><tr><th class='border px-2 py-1 bg-gray-100'>Field</th><th class='border px-2 py-1 bg-gray-100'>Value</th></tr></thead>";
//   html += "<tbody>";

//   for (const key in formData) {
//     html += `
//       <tr>
//         <td class="border px-2 py-1 font-medium">${key}</td>
//         <td class="border px-2 py-1">${formData[key] || "<em>Not Provided</em>"}</td>
//       </tr>
//     `;
//   }

//   html += "</tbody></table>";
//   reviewEl.innerHTML = html; 
// }

// if (reviewBtn) {
//   reviewBtn.addEventListener("click", () => {
//     saveStepData(steps[currentStepIndex]);
//     renderReview();
//     if (typeof REVIEW_INDEX !== "undefined" && REVIEW_INDEX >= 0) {
//       showStep(REVIEW_INDEX);
//     } else {
//       console.warn("Review step not found in stepIds");
//     }
//   });
// }