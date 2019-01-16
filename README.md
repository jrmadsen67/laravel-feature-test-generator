# Laravel Feature Test Generator

Generator to create simple feature tests for Resource Controller in Laravel

# Description

The purpose of this generator to provide very quick, basic scaffolding for minimal feature test coverage against resource controllers. These can be run before you have built out any code, in a TDD fashion of sorts, or to add coverage to existing routes.

The goal is to get people past the "takes too much time" or "I'm not sure where to get started" phase of testing, and give them a direction to go in.

# Usage

Start with a composer pull:

`composer require jrmadsen67/laravel-feature-test-generator --dev`

to bring the generator into your application. You may then create a set of feature tests with:

`artisan feature-test:generate Post`

where `Post` is the name of your resource (typically the same as the Model you are building around).

That's it! Or can be - you have an additional option.

The above will run what I consider to be very simple but complete resource tests that cover index, show, create, store, edit, update and destroy. If you have some additional tests that you always like to run you may publish that stub and extend:

`artisan vendor:publish --tag=stubs`

This will copy the stub file to `config/feature-test-generator/stubs/resource_feature_tests.stub` where you can make your own changes.  

# VERY IMPORTANT NOTE YOU PROBABLY WON'T READ

This does NOT write your routes or actual code for you! When you first run these tests, they will fail (unless you are adding them afterwards to test your existing code). You will be able to go through route by route and build out your code, adding to the test file itslef to handle failing tests and whatever else you want. 

This is not a substitute for proper testing, just an "onboarding" into basic test coverage.

# Additional Notes

This is very early and simple at the moment, in part because it needs to be simple enough that it will work as a starting point for everyone.

If you have tests you like to run all the time, I'd suggest using the publish feature. If you have tests or other functionality you think a majority of users would benefit from, I would be happy to accept any PRs.


Happy Testing!

----

I prefer you use the Issues section for problems, but if you do need to reach me you can do so at: https://twitter.com/codebyjeff
