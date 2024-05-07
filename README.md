## My train of thoughts

1. I will need to create a structured folder with Composer PSR-4 loading so I get to easy over view of the project and existing options.
2. I work with formatted code so I will add prettier for effortless formatting. Later I will setup phpstan for better feedback.
3. I am also considering pulling phpunit for conventional testing if I see that fit and I have time to set it up (in contrast to `php test.php`).
4. I will copy all descriptions from the task so that I have a clear to-do list.
5. Review & convert all variable names to commonly used camelCase.
6. Setup tests and then walk backwards to implement methods.

### ToDo:

-   [x] Setup phpstan
-   [x] Review variables
-   [x] Setup php-unit

### Given todo

-   [ ] Implement PSR-2
-   [ ] Easily Testable (error-free)
-   [ ] Implement PSR
-   [ ] Well-documented

## Thoughts

-   Type money could be considered to be implemented to provide granular way of tracking. Decimals are too risky.
-   Database transcations must be applied during transfers.
-   Furthermore, race-conditions must be taken into account to prevent multiple transfers at the same time.
-   In certain places, I applied read only properties under assumption that is something that is defined once and must therefore remain static. Similar to KYC in the banks.
