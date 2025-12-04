
            <h1 class="font-semibold text-lg mb-4">
              Present Work/Education/Training Information
            </h1>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong>Provide the following information concerning
              your current employment or education.
            </div>
            <div class="mb-4">
              <label for="occupation" class="block font-semibold mb-1">Primary Occupation</label>
              <select
              name="occupation"
                id="primary-occupation"
                class="w-full border rounded px-3 py-2"
              >
                <option value="">-- Select One --</option>
                <option value="retired">Retired</option>
                <option value="agriculture">Agriculture</option>
                <option value="business">Business</option>
                <option value="communications">Communications</option>
                <option value="computer_science">Computer Science</option>
                <option value="culinary">Culinary / Food Services</option>
                <option value="education">Education</option>
                <option value="engineering">Engineering</option>
                <option value="government">Government</option>
                <option value="homemaker">Homemaker</option>
                <option value="legal">Legal Profession</option>
                <option value="medical">Medical / Health</option>
                <option value="military">Military</option>
                <option value="natural_science">Natural Science</option>
                <option value="physical_science">Physical Sciences</option>
                <option value="religious">Religious Vocation</option>
                <option value="research">Research</option>
                <option value="social_science">Social Science</option>
                <option value="student">Student</option>
                <option value="not_employed">Not Employed</option>
                <option value="other">Other</option>
              </select>
            </div>

            <div
              id="occupation-extra"
              class="hidden bg-[#f0f4f8] p-4 rounded mt-2"
            >
              <div
                id="not-employed-section"
                class="mt-2 border border-gray-300 p-4 rounded-md bg-gray-50"
              >
                <label class="block font-semibold mb-1">Explain:</label>
                <textarea
                  rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2"
                  placeholder="Provide explanation here..."
                ></textarea>
              </div>

              <div
                id="occupation-info-section"
                class="fmx-auto hidden flex max-w-sm flex-col gap-y-4 rounded-xl p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 bg-[#f0f4f8]"
              >
                <div class="mb-2">
                  <label for="school-name" class="font-semibold block mb-1"
                    >Present Employer or School Name</label
                  >
                  <input name="school-name" type="text" class="w-full border rounded px-3 py-2" />
                </div>
                <span>Present employer or school address:</span>
                <div class="mb-2 mt-2">
                  <label for="school-street" class="font-semibold block mb-1"
                    >Street Address (Line 1)</label
                  >
                  <input name="school-street" type="text" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="mb-2">
                  <label for="school-street-L2" class="font-semibold block mb-1"
                    >Street Address (Line 2)<span class="text-red-500"
                      >*Optional</span
                    ></label
                  >
                  <input name="school-street-L2" type="text" class="w-full border rounded px-3 py-2" />
                </div>
                <div class="mb-2">
                  <label for="city7" class="font-semibold block mb-1">City</label>
                  <input name="city7" type="text" class="w-full border rounded px-3 py-2" required/>
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="school-state" class="font-semibold block mb-1"
                      >State/Province</label
                    >
                    <input
                    name="school-state"
                      type="text"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="school-zcode" class="font-semibold block mb-1"
                      >Postal Code/Zip Code (if known)</label
                    >
                    <input
                    name="school-zcode"
                      type="text"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div class="mb-2">
                  <label for="school-number" class="font-semibold block mb-1">Phone Number</label>
                  <input
                  name="school-number"
                    type="number"
                    class="w-full border rounded px-3 py-2"
                  />
                </div>
            
        
 
  <!-- Example: Occupation country -->
  <div class="mb-2">
    <label for="occupation-country" class="font-semibold">Occupation Country/Region:</label>
    <select id="occupation-country" name="occupation-country" class="w-full border rounded px-3 py-2" required>
      <option>Select One</option>
    </select>
  </div>
                <div class="mb-2 mt-6">
                  <label for="school-Sdate" class="font-semibold block mb-1">Start Date</label>
                  <input
                  name="school-Sdate"
                    type="date"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="monthly-income" class="font-semibold block mb-1">
                      Monthly Income in Local Currency (if employed)
                    </label>
                    <input
                      type="text"
                      name="monthly-income"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div
                  id="duty-details"
                  class="mt-2 border border-gray-300 p-4 rounded-md bg-gray-50"
                >
                  <label class="block font-semibold mb-1">Explain:</label>
                  <textarea
                    rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    placeholder="Provide explanation here..."
                  ></textarea>
                </div>
              </div>
            </div>
         