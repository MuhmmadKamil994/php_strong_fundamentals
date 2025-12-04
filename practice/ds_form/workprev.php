
            <h1 class="font-semibold text-lg mb-4">
              Previous Work/Education/Training Information
            </h1>

            <div id="previous-employ-details" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q: Were you previously employed?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="previous-employ"
                    value="yes"
                    id="previous-employ-yes"
                  />
                  Yes
                </label>
                <label>
                  <input
                    type="radio"
                    name="previous-employ"
                    value="no"
                    id="previous-employ-no"
                  />
                  No
                </label>
              </div>
            </div>

            <div id="previous-employ-container" class="hidden">
              <div id="employment-list"></div>
              <button
                type="button"
                id="add-employment"
                class="mt-3 bg-blue-600 text-white px-3 py-1 rounded"
              >
                + Add Another
              </button>
            </div>

            <div id="employment-template" class="hidden">
              <div
                class="employment-block mb-6 p-4 border border-gray-300 rounded-lg bg-[#f0f4f8] relative"
              >
                <button
                  type="button"
                  class="remove-employment absolute top-2 right-2 text-red-500 font-bold"
                >
                  ✖
                </button>

                <div class="mb-2">
                  <label for="employer-name" class="font-semibold block mb-1">Employer Name</label>
                  <input name="employer-name" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2 mt-2">
                  <label for="Estreet-one" class="font-semibold block mb-1"
                    >Street Address (Line 1)</label
                  >
                  <input name="Estreet-one" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-1">
                  <label for="Estreet-two" class="font-semibold block mb-1"
                    >Street Address (Line 2)
                    <span class="text-red-500">*Optional</span></label
                  >
                  <input name="Estreet-two" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-1">
                  <label for="E-city" class="font-semibold block mb-1">City</label>
                  <input name="E-city" type="text" class="w-full border rounded px-3 py-2" required/>
                </div>

                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="E-province" class="font-semibold block mb-1"
                      >Province/State</label
                    >
                    <input
                    name="E-province"
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
                    <label for="E-zcode" class="font-semibold block mb-1"
                      >Postal Code/Zip Code (if known)</label
                    >
                    <input
                    name="E-zcode"
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
                <label
                  for="education-country"
                  
                  class="font-semibold"
                  >Country/Region:</label
                >
                <select id="education-country" name="education-country" class="w-full border rounded px-3 py-2" required>
                  <option>Select One</option>
                </select>
</div>

                <div class="mb-1">
                  <label for="E-Pnumber" class="font-semibold block mb-1">Phone Number</label>
                  <input
                    type="number"
                    name="E-Pnumber"
                    class="w-full border rounded px-3 py-2"
                  />
                </div>

                <div class="mb-0 mt-4">
                  <label for="j-title" class="font-semibold block mb-1">Job Title</label>
                  <input name="j-title" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-0">
                  <label for="Super-Sname" class="font-semibold block mb-1"
                    >Supervisor's Surnames</label
                  >
                  <input name="Super-Sname" type="text" class="w-full border rounded px-3 py-2" />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" /> <label>Does Not Apply</label>
                  </div>
                </div>

                <div class="mb-0">
                  <label for="Super-gname" class="font-semibold block mb-1"
                    >Supervisor's Given Names</label
                  >
                  <input name="Super-gname" type="text" class="w-full border rounded px-3 py-2" />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" /> <label>Does Not Apply</label>
                  </div>
                </div>

                <div class="mb-2 mt-4">
                  <label for="j-start" class="font-semibold block mb-1">Start Date</label>
                  <input
                  name="j-start"
                    type="date"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div class="mb-2 mt-4">
                  <label for="E-date" class="font-semibold block mb-1"
                    >Employment Date To</label
                  >
                  <input
                  name="E-date"
                    type="date"
                    class="w-full border rounded px-3 py-2"
                    required
                  />
                </div>

                <div
                  class="mt-2 border border-gray-300 p-4 rounded-md bg-gray-50"
                >
                  <label class="block font-semibold mb-1"
                    >Briefly describe your duties:</label
                  >
                  <textarea
                    rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2"
                    placeholder="Provide explanation here..."
                  ></textarea>
                </div>
              </div>
            </div>

            <div id="education-question" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q: Have you attended any educational institutions at a secondary
                level or above?
                <span
                  class="text-blue-600 cursor-pointer"
                  data-bs-toggle="tooltip"
                  title="Level of Education: You must answer Yes to this question if you have ever attended, for any length of time, a high school/secondary school (or its equivalent in your country) or college, university, graduate school, a doctoral program, or a vocational program."
                  >ℹ️</span
                >
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="education"
                    value="yes"
                    id="education-yes"
                  />
                  Yes
                </label>
                <label>
                  <input
                    type="radio"
                    name="education"
                    value="no"
                    id="education-no"
                  />
                  No
                </label>
              </div>
            </div>

            <div id="education-section" class="hidden space-y-4"></div>

            <div id="education-template" class="hidden">
              <div
                class="education-entry fmx-auto flex max-w-sm flex-col gap-y-4 rounded-xl p-6 shadow-lg outline outline-black/5 bg-[#f0f4f8] relative"
              >
                <button
                  type="button"
                  class="remove-education absolute top-2 right-2 text-red-500 text-sm"
                >
                  Remove
                </button>

                <div class="mb-2">
                  <label for="institute-name" class="font-semibold block mb-1"
                    >Name of Institution</label
                  >
                  <input form="institute-name" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2 mt-2">
                  <label for="institute-address" class="font-semibold block mb-1"
                    >Street Address (Line 1)</label
                  >
                  <input name="institute-address" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-1">
                  <label for="institute-address2" class="font-semibold block mb-1"
                    >Street Address (Line 2)
                    <span class="text-red-500">*Optional</span></label
                  >
                  <input name="institute-address2" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2">
                  <label for="institute-city" class="font-semibold block mb-1">City</label>
                  <input name="institute-city" type="text" class="w-full border rounded px-3 py-2"  required/>
                </div>

                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="institute-province" class="font-semibold block mb-1"
                      >State/Province</label
                    >
                    <input
                    name="institute-province"
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
                    <label for="institute-zcode" class="font-semibold block mb-1"
                      >Postal/Zip Code (if known)</label
                    >
                    <input
                    name="institute-zcode"
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
                <label
                  for="Employee-country"
                  
                  class="font-semibold"
                  >Country/Region:</label
                >
                <select id="Employee-country" name="Employee-country" class="w-full border rounded px-3 py-2" required>
                  <option>Select One</option>
                </select>
</div>
                <div  class="mb-2">
                  <label for="study-course"  class="font-semibold block mb-1"
                    >Course of Study</label
                  >
                  <input name="study-course" type="text" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2">
                  <label for="attendance-from" class="font-semibold block mb-1"
                    >Date of Attendance From</label
                  >
                  <input name="attendance-from" type="date" class="w-full border rounded px-3 py-2" />
                </div>

                <div class="mb-2">
                  <label for="attendance-to" class="font-semibold block mb-1"
                    >Date of Attendance To</label
                  >
                  <input name="attendance-to" type="date" class="w-full border rounded px-3 py-2" />
                </div>
              </div>
            </div>

            <button
              id="add-education"
              type="button"
              class="hidden bg-blue-600 text-white px-3 py-2 rounded"
            >
              Add Another
            </button>
         