<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\LeadsController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SourceController;
use App\Http\Controllers\TypeController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::resource('services', ServiceController::class);

Route::post('disable/{id}', [HomeController::class,'disable'])->name('disable');

Route::get('add-quotes', [QuoteController::class, 'index']);
Route::post('add-quotes', [QuoteController::class, 'store']);
Route::get('list-quotes', [QuoteController::class, 'show']);
Route::get('edit-quotes/{id}', [QuoteController::class, 'edit']);
Route::post('edit-quotes/{id}', [QuoteController::class, 'update']);
Route::get('delete-quotes/{id}', [QuoteController::class, 'destroy']);

Route::get('inbox-mail', [MailsController::class, 'inbox_mail']);
Route::get('compose-mail', [MailsController::class, 'compose_mail']);
Route::get('draft-mails', [MailsController::class, 'compose_mail']);
Route::get('outbox-mails', [MailsController::class, 'compose_mail']);
Route::get('sent-mails', [MailsController::class, 'compose_mail']);
Route::get('trash-mails', [MailsController::class, 'compose_mail']);

Route::get('activities-index', [ActivityController::class, 'activitiesIndex'])->name('activities.index');
Route::post('activities-store', [ActivityController::class, 'activitiesStore'])->name('activities.store');
Route::post('file-upload', [ActivityController::class, 'fileUpload'])->name('file_upload');

Route::get('contact-persons', [ContactController::class, 'person_contact']);
Route::get('edit-person/{person}', [ContactController::class, 'editPerson'])->name('person.edit');
Route::post('update-person/{person}', [ContactController::class, 'updatePerson'])->name('person.update');
Route::post('delete-person/{person}', [ContactController::class, 'deletePerson'])->name('person.delete');
Route::get('contact-organizations', [ContactController::class, 'organizations_contact']);
Route::get('create-organization', [ContactController::class, 'createOrganization'])->name('organization.create');
Route::post('store-organization', [ContactController::class, 'storeOrganization'])->name('organization.store');
Route::get('edit-organization/{organization}', [ContactController::class, 'editOrganization'])->name('organization.edit');
Route::post('update-organization/{organization}', [ContactController::class, 'updateOrganization'])->name('organization.update');
Route::post('delete-organization/{organization}', [ContactController::class, 'deleteOrganization'])->name('organization.delete');

Route::get('list-roles', [SettingsController::class, 'listRoles']);
Route::get('list-users', [SettingsController::class, 'listUsers']);
//Route::get('list-sources', [SettingsController::class, 'listSources']);
//Route::get('list-types', [SettingsController::class, 'listTypes']);
Route::get('list-email-templates', [SettingsController::class, 'listEmailTemplates']);
Route::get('list-workflows', [SettingsController::class, 'listWorkflows']);
Route::get('general-settings', [SettingsController::class, 'langSettings']);

Route::get('dashboard-leads', [LeadsController::class, 'getDashboardLeads'])->name('leads.index');
Route::get('create-leads', [LeadsController::class, 'createLeads'])->name('leads.create');
Route::get('create-leads/{id}', [LeadsController::class, 'createLeadsbyCategory'])->name('leads.add');
Route::post('stage-leads', [LeadsController::class, 'changeLeadsStage'])->name('leads.stage');
Route::post('store-leads', [LeadsController::class, 'storeLeads'])->name('leads.store');
Route::get('edit-leads/{lead}', [LeadsController::class, 'editLeads'])->name('leads.edit');
Route::post('update-leads/{lead}', [LeadsController::class, 'updateLeads'])->name('leads.update');
//Route::post('delete-leads/{lead}', [LeadsController::class, 'deleteLeads'])->name('leads.delete');
Route::get('view-lead/{id}', [LeadsController::class, 'viewLeadDetail'])->name('leads.show');
Route::get('lead-activity', [LeadsController::class, 'activitiesStore'])->name('lead.activity');
Route::get('lead-notes', [LeadsController::class, 'notesStore'])->name('lead.notes');

Route::resource('sources', SourceController::class);
Route::resource('types', TypeController::class);


