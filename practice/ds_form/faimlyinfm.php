
            <h1 class="font-semibold text-lg mb-4">
              Faimly Information:Relatives
            </h1>
            <div
              class="border border-gray-400 bg-gray-50 p-4 rounded-md text-sm text-gray-700 mb-6"
            >
              <strong>NOTE:</strong> NOTE: Please provide the following
              information concerning your biological parents. If you are
              adopted, please provide the following information on your adoptive
              parents.
            </div>
            <div
              id="Contact-check-father"
              class="mb-4 mt-2 p-4 border border-gray-400 rounded-lg bg-gray-50 shadow-sm"
            >
              <h2 class="font-semibold text-lg mb-4">
                Father's Full Name and Date of Birth
              </h2>
              <div class="state-toggle-block">
                <div class="mb-2">
                  <label for="F-sname" class="font-semibold block mb-1">Surname</label>
                  <input
                    type="text"
                    name="F-sname"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <span class="text-gray-500 text-xs"
                    >(e.g., Hernandez Garcia)</span
                  >
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>
              <div class="state-toggle-block">
                <div class="mb-2">
                  <label for="F-gname" class="font-semibold block mb-1">Given Names</label>
                  <input
                  name="F-gname"
                    type="text"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <span class="text-gray-500 text-xs">(e.g., Juan Miguel)</span>
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>
              <div class="state-toggle-block">
                <div class="mb-2">
                  <label for="F-dob" class="font-semibold block mb-1">Date of Birth</label>
                  <input
                    type="date"
                    name="F-dob"
                    class="w-full border rounded px-3 py-2 state-input"
                    required
                  />
                  <div class="flex items-center gap-2 text-sm mt-1">
                    <input type="checkbox" class="state-toggle-checkbox" />
                    <label>Does Not Apply</label>
                  </div>
                </div>
              </div>

              <div id="father-details" class="mb-4 mt-2">
                <label class="block font-semibold mb-2">
                  Q: Is your Father in the U.S.?
                </label>
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="live-father"
                      value="yes"
                      id="live-father-yes"
                      required
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      name="live-father"
                      value="no"
                      id="live-father-no"
                    />
                    No
                  </label>
                </div>
              </div>
              <div
                id="father-status-container"
                class="mb-4 hidden mt-2 p-4 border border-gray-400 rounded-lg bg-gray-50 shadow-sm"
              >
                <label for="father-status-us" class="block font-semibold mb-1">
                  Father's Status (Live in U.S.)
                </label>
                <select
                  id="father-status-us"
                  name="father-status-us"
                  class="w-full border rounded px-3 py-2"
                >
                  <option value="">-- Select Status --</option>
                  <option value="us_citizen">U.S. Citizen</option>
                  <option value="lawful_permanent_resident">
                    Lawful Permanent Resident (Green Card)
                  </option>
                  <option value="nonimmigrant">
                    Nonimmigrant (Temporary Visa)
                  </option>
                  <option value="other">Other/I don't Know</option>
                  <option value="unknown">Unknown</option>
                </select>
              </div>
              <div
                id="Contact-check-mother"
                class="mb-4 mt-2 p-4 border border-gray-400 rounded-lg bg-gray-50 shadow-sm"
              >
                <h2 class="font-semibold text-lg mb-4">
                  Mother Full Name and Date of Birth
                </h2>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="M-sname" class="font-semibold block mb-1">Surnames</label>
                    <input
                    name="M-sname"
                      type="text"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <span class="text-gray-500 text-xs"
                      >((e.g., Hernandez Garcia))</span
                    >
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="M-gname" class="font-semibold block mb-1">Given Names</label>
                    <input
                      type="text"
                      name="M-gname"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <span class="text-gray-500 text-xs"
                      >(e.g., Juan Miguel)</span
                    >
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>
                <div class="state-toggle-block">
                  <div class="mb-2">
                    <label for="M-dob" class="font-semibold block mb-1"
                      >Date of Birth</label
                    >
                    <input
                      type="date"
                      name="M-dob"
                      class="w-full border rounded px-3 py-2 state-input"
                      required
                    />
                    <div class="flex items-center gap-2 text-sm mt-1">
                      <input type="checkbox" class="state-toggle-checkbox" />
                      <label>Does Not Apply</label>
                    </div>
                  </div>
                </div>

                <div id="father-details" class="mb-4 mt-2">
                  <label class="block font-semibold mb-2">
                    Q: Is your mother in the U.S.?
                  </label>
                  <div class="flex space-x-4">
                    <label>
                      <input
                        type="radio"
                        name="live-mother"
                        value="yes"
                        id="live-mother-yes"
                        required
                      />
                      Yes
                    </label>
                    <label>
                      <input
                        type="radio"
                        name="live-mother"
                        value="no"
                        id="live-mother-no"
                      />
                      No
                    </label>
                  </div>
                </div>
                <div id="mother-status-container" class="mb-4 hidden">
                  <label
                    for="mother-status-us"
                    class="block font-semibold mb-1"
                  >
                    mother's Status (Live in U.S.)
                  </label>
                  <select
                    id="mother-status-us"
                    name="mother-status-us"
                    class="w-full border rounded px-3 py-2"
                  >
                    <option value="">-- Select Status --</option>
                    <option value="us_citizen">U.S. Citizen</option>
                    <option value="lawful_permanent_resident">
                      Lawful Permanent Resident (Green Card)
                    </option>
                    <option value="nonimmigrant">
                      Nonimmigrant (Temporary Visa)
                    </option>
                    <option value="other">Other/I don't Know</option>
                    <option value="unknown">Unknown</option>
                  </select>
                </div>
              </div>
              <div id="immediate-details" class="mb-4 mt-2">
                <label class="block font-semibold mb-2">
                  Q: Do you have any immediate relatives, not including parents,
                  in the United States?
                  <span
                    class="text-blue-600 cursor-pointer"
                    data-bs-toggle="tooltip"
                    title="Means fiancé/fiancée, spouse (husband/wife), child (son/daughter), or sibling (brother/sister)."
                    >ℹ️</span
                  >
                </label>
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="live-immediate"
                      value="yes"
                      id="live-immediate-yes"
                      required
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      name="live-immediate"
                      value="no"
                      id="live-immediate-no"
                    />
                    No
                  </label>
                </div>
              </div>

              <div
                id="Contact-check-relative"
                class="mb-4 hidden mt-2 p-4 border border-gray-400 rounded-lg bg-gray-50 shadow-sm"
              >
                <div id="relative-container">
                  <div
                    class="relative-block mb-4 border border-gray-300 rounded-lg p-3 bg-white"
                  >
                    <div class="state-toggle-block">
                      <div class="mb-2">
                        <label for="immidate-relative-sname" class="font-semibold block mb-1">Surnames</label>
                        <input
                          type="text"
                          name="immidate-relative-sname"
                          class="w-full border rounded px-3 py-2 state-input"
                          required
                        />
                        <span class="text-gray-500 text-xs"
                          >((e.g., Hernandez Garcia))</span
                        >
                        <div class="flex items-center gap-2 text-sm mt-1">
                          <input
                            type="checkbox"
                            class="state-toggle-checkbox"
                          />
                          <label>Does Not Apply</label>
                        </div>
                      </div>
                    </div>
                    <div class="state-toggle-block">
                      <div class="mb-2">
                        <label for="immidate-relative-gname" class="font-semibold block mb-1"
                          >Given Names</label
                        >
                        <input
                          type="text"
                          class="w-full border rounded px-3 py-2 state-input"
                          required
                          name="immidate-relative-gname"
                        />
                        <span class="text-gray-500 text-xs"
                          >(e.g., Juan Miguel)</span
                        >
                        <div class="flex items-center gap-2 text-sm mt-1">
                          <input
                            type="checkbox"
                            class="state-toggle-checkbox"
                          />
                          <label>Does Not Apply</label>
                        </div>
                      </div>
                    </div>
                    <div class="mb-2">
                      <label for="realtion-with-U" class="font-semibold mb-1 block"
                        >Relationship to You</label
                      >
                      <select
                      name="realtion-with-U"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        required
                      >
                        <option value="">--Select Relationship--</option>
                        <option value="fiance">Fiancé/Fiancée</option>
                        <option value="spouse">Spouse</option>
                        <option value="sibling">Sibling</option>
                        <option value="child">Child</option>
                        <option value="other">Other</option>
                      </select>
                    </div>

                    <button
                      type="button"
                      class="remove-relative bg-red-600 text-white px-3 py-1 rounded mt-2 hover:bg-red-700 hidden"
                    >
                      Remove
                    </button>
                  </div>
                </div>

                <button
                  type="button"
                  id="add-relative"
                  class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700"
                >
                  + Add Another Relative
                </button>
              </div>

              <div id="other-relative-details" class="mb-4 mt-2 hidden">
                <label class="block font-semibold mb-2">
                  Q: Do you have any other relatives in the United States?
                </label>
                <div class="flex space-x-4">
                  <label>
                    <input
                      type="radio"
                      name="live-relation"
                      value="yes"
                      id="live-relation-yes"
                    />
                    Yes
                  </label>
                  <label>
                    <input
                      type="radio"
                      name="live-relation"
                      value="no"
                      id="live-relation-no"
                    />
                    No
                  </label>
                </div>
              </div>
            </div>
         