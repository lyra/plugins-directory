# Project Instructions

## Scope

- This repository stores payment plugin metadata consumed by documentation websites.
- Root JSON files list plugins by brand or region; matching directories contain CMS detail files.
- CMS detail files contain a `current` version group and optional `archives` groups with `packages`.
- `code_example/` contains code example metadata and `img/` contains visual assets.

## Editing

- Follow the nearby JSON indentation and naming conventions. JSON must remain valid, without comments or trailing commas.
- Preserve existing metadata, download URLs, documentation links and locale mappings unless the task requires changes.
- Keep changes focused on the requested brands, CMS entries or documentation.
- Refer to README.md for supported metadata properties and their defaults.
- Frontend rendering and translation keys are implemented in the separate `front` repository; do not assume a new metadata value automatically creates a translation.
- Keep README.md in English, consistent with the existing documentation.

## Validation

- Parse each modified JSON file with a JSON parser before finalizing.
- For documentation examples, check that JSON examples are valid and match the current frontend behavior.
- Run `git diff --check` and report validation results or environment blockers.
- This repository has no package.json or declared automated test command; do not invent a build or test command.
- AGENTS.md is local configuration and must remain ignored by Git.
