# Laravel whereRelation() Eloquent method 

Adds a 'whereRelation' scope to an eloquent model

This is a snippet I use all the time, it returns a query with a condition on a relations.

## Installation

Copy and paste the file to wherever you store your traits, then reference the trait in whichever models you need to query
(don't forget to update the namespace)


`use App\Traits\WhereRelation ;`

..then in the model class:

`use WhereRelation ;`


## Usage

Get all users that have added a post in the last month:

`User::whereRelation('posts', 'created_at', '>', Carbon::now()->subDays(30))->get()`
