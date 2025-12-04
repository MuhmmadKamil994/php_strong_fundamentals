
            <h1 class="font-semibold text-lg mb-4">Passport Information</h1>

            <div class="mb-4">
              <label
                for="passport-document-type"
                class="font-semibold block mb-1"
              >
                Passport/Travel Document Type
              </label>
              <select
              name="passport-document-type"
                id="passport-document-type"
                class="w-full border rounded px-3 py-2"
                required
              >
                <option value="" disabled selected>Select One</option>
                <option value="regular-passport">Regular Passport</option>
                <option value="diplomatic-passport">Diplomatic Passport</option>
                <option value="official-passport">Official Passport</option>
                <option value="service-passport">Service Passport</option>
                <option value="special-passport">Special Passport</option>
                <option value="travel-document">Travel Document</option>
                <option value="other">Other</option>
              </select>
            </div>
            <div class="mb-4">
              <label for="passport-number" class="font-semibold block mb-1"
                >Passport/Travel Document Number</label
              >
              <input
              name="passport-number"
                type="text"
                class="w-full border rounded px-3 py-2"
                required
              />
            </div>
            <div class="state-toggle-block">
              <div class="mb-4 mt-4">
                <label for="passport-book" class="font-semibold block mb-1">
                  Passport Book Number
                </label>
                <input
                name="passport-book"
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
            <div
              id="passport-issue-details"
              class="fmx-auto flex sm-w-sm flex-col gap-y-4 rounded-xl p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 bg-[#f0f4f8]"
            >
              <h3 class="font-semibold text-lg mb-4">
                Where was the Passport/Travel Document Issued?
              </h3>
              <div class="mb-4">
                <label for="city5" class="font-semibold block mb-1">City</label>
                <input
                name="city5"
                  type="text"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>

              <div class="mb-4">
                <label for="state-of-passport" class="font-semibold block mb-1"
                  >State/Province *If shown on passport</label
                >
                <input name="state-of-passport" type="text" class="w-full border rounded px-3 py-2" />
              </div>
              <div>
                <label for="passport-issue-country" class="font-semibold"
                  >Country/Region:
                </label>
                <select
                  id="passport-issue-country"
                  name="passport-issue-country"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
            </div>
            <div id="passport-issue-date">
              <div class="mb-6">
                <label for="Pissue-date" class="font-semibold block mb-1">Issuance Date</label>
                <input
                  type="date"
                  name="Pissue-date"
                  class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                  required
                />
              </div>
            </div>
            <div class="state-toggle-block">
              <div id="passport-issue date">
                <div class="mb-6">
                  <label for="expiry-date" class="font-semibold block mb-1"
                    >Date of Expiration
                    <span
                      class="text-blue-600 cursor-pointer"
                      data-bs-toggle="tooltip"
                      title="In most cases your passport/Travel Document must have at least six months of validity beyond the date of your visa application and/or your arrival in the United States"
                      >ℹ️</span
                    >
                  </label>
                  <input
                  name="expiry-date"
                    type="date"
                    class="w-full state-input border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                  />
                </div>
                <div class="flex items-center gap-2 text-sm mt-1">
                  <input type="checkbox" class="state-toggle-checkbox" />
                  <label>No Expiration</label>
                </div>
              </div>
            </div>
            <div id="stolen-passport-details" class="mb-4 mt-2">
              <label class="block font-semibold mb-2">
                Q:Have you ever lost a passport or had one stolen ?
              </label>
              <div class="flex space-x-4">
                <label>
                  <input
                    type="radio"
                    name="stolen-passport"
                    value="yes"
                    id="stolen-passport-yes"
                    required
                  />
                  Yes
                </label>
                <label>
                  <input
                    type="radio"
                    name="stolen-passport"
                    id="stolen-passport-no"
                    value="no"
                  />
                  No
                </label>
              </div>
            </div>
            <div
              id="stolen-passport-issue-details"
              class="hidden fmx-auto flex sm-w-sm flex-col gap-y-2 rounded-xl p-6 shadow-lg outline outline-black/5 dark:bg-slate-800 dark:shadow-none dark:-outline-offset-1 dark:outline-white/10 bg-[#f0f4f8] mt-4"
            >
              <h3 class="font-semibold text-lg mb-4">
                Provide the following information:
              </h3>
              <div class="mb-4">
                <label for="Pdocument-number" class="font-semibold block mb-1"
                  >Passport/Travel Document Number</label
                >
                <input
                  type="text"
                  name="Pdocument-number"
                  class="w-full border rounded px-3 py-2"
                  required
                />
              </div>
              <div class="mt-1">
                <label
                  for="stolen-passport-issue-country"
                  class="font-semibold"
                >
                  Country/Authority that Issued Passport/Travel Document
                </label>
                <select
                  id="stolen-passport-issue-country"
                  name="stolen-passport-issue-country"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="block font-semibold mb-1">Explain:</label>
                <textarea
                  rows="4"
                  class="w-full border border-gray-300 rounded px-3 py-2"
                  placeholder="Provide explanation here..."
                ></textarea>
              </div>

              <div class="mt-4 flex gap-4">
                <button
                  id="add-section-btn"
                  type="button"
                  class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                >
                  Add Another
                </button>
                <button
                  id="remove-section-btn"
                  type="button"
                  class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 hidden"
                >
                  Remove
                </button>
              </div>
            </div>
      