
            <h1 class="font-semibold text-lg mb-4">
              Faimly Information:Spouse
            </h1>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong> Enter current Spouse information.
            </div>
            <div class="bg-[#f0f4f8] p-5 rounded-lg">
              <h3 class="font-semibold text-sm mb-4">
                Spouse's Full Name (inlcude Maiden Name)
              </h3>
              <div class="mb-2">
                <label for="spouse-sname" class="font-semibold block mb-1">Spouse's Surname</label>
                <input
                  type="text"
                  name="spouse-sname"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <span class="text-gray-500 text-xs"
                  >(e.g., Hernandez Garcia)</span
                >
              </div>
              <div class="mb-2">
                <label for="spouse-gname" class="font-semibold block mb-1"
                  >Spouse's Given Names</label
                >
                <input
                  type="text"
                  name="spouse-gname"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
                <span class="text-gray-500 text-xs">(e.g., Juan Miguel)</span>
              </div>
              <div class="mb-2">
                <label for="spouse-dob" class="font-semibold block mb-1"
                  >Spouse's Date of Birth</label
                >
                <input
                name="spouse-dob"
                  type="date"
                  class="w-full border rounded px-3 py-2 state-input"
                  required
                />
              </div>
              <div>
                <label for="Spouse-country" class="font-semibold"
                  >Country/Region:
                </label>
                <select
                  id="Spouse-country"
                  name="Spouse-country"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
            </div>
            <h3 class="font-semibold text-sm mb-4">Spouse's Place of Birth</h3>
            <div class="bg-[#f0f4f8] p-5 rounded-lg">
              <div class="state-toggle-block">
                <div class="mb-2">
                  <label for="spouse-city" class="font-semibold block mb-1">City</label>
                  <input
                  name="spouse-city"
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
              <div>
                <label for="Spouse-birth-country" class="font-semibold"
                  >Country/Region:
                </label>
                <select
                  id="Spouse-birth-country"
                  name="Spouse-birth-country"
                  class="w-full border rounded px-3 py-2"
                  required
                >
                  <option>Select One</option>
                </select>
              </div>
            </div>
            <div class="mb-4">
              <label  for="spouse-address" class="block font-semibold mb-2">
                Spouse’s Address
              </label>
              <select
             

                id="spouse-address"
                name="spouse-address"
                class="w-full border rounded px-3 py-2"
              >
                <option value="">-- Select --</option>
                <option value="same-as-applicant">
                  SAME AS A HOME ADDRESS
                </option>
                <option value="different">SAME AS A MAILING ADDRESS</option>
                <option value="different">SAME AS A U.S CONTACT ADDRESS</option>
                <option value="different">OTHER (SPECIFY ADDRESS)</option>
                <option value="unknown">Do not know</option>
              </select>
            </div>
        