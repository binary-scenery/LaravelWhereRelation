# LaravelWhereRelation
Adding a 'whereRelation' query to laravel

This is a snippet I use all the time, it returns a query with a condition on a relations.

## Installation

Copy and paste the file to wherever you store your traits, then reference the trait in whichever models you need to query
(don't forget to update the namespace)


`use App\Traits\QueryRelations ;`

..then in the model class:

`use QueryRelations ;`


## Usage

Get all users that have added a post in the last month:

`User::whereRelation('posts', 'created_at', '>', Carbon::now()->subDays(30))->get()`
