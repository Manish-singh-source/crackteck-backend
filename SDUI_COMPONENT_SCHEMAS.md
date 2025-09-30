# SDUI Component Schemas Reference

Complete reference for all supported component types and their JSON schemas.

---

## 1. Header Component

**Type:** `header`

**Description:** Display titles and subtitles with customizable styling.

**Schema:**
```json
{
  "title": "string (required)",
  "subtitle": "string (optional)",
  "alignment": "left|center|right (optional, default: left)",
  "style": {
    "fontSize": "number (optional, default: 24)",
    "fontWeight": "normal|bold|100-900 (optional, default: bold)",
    "color": "string (hex color, optional, default: #000000)",
    "backgroundColor": "string (hex color, optional)",
    "padding": "number (optional)",
    "margin": "number (optional)"
  }
}
```

**Example:**
```json
{
  "title": "Welcome Back",
  "subtitle": "Sign in to continue",
  "alignment": "center",
  "style": {
    "fontSize": 28,
    "fontWeight": "bold",
    "color": "#1a1a1a"
  }
}
```

---

## 2. Text Component

**Type:** `text`

**Description:** Display plain text content.

**Schema:**
```json
{
  "content": "string (required)",
  "alignment": "left|center|right|justify (optional, default: left)",
  "maxLines": "number (optional)",
  "overflow": "clip|ellipsis|fade (optional)",
  "style": {
    "fontSize": "number (optional, default: 14)",
    "fontWeight": "normal|bold|100-900 (optional)",
    "color": "string (hex color, optional, default: #333333)",
    "fontStyle": "normal|italic (optional)",
    "decoration": "none|underline|lineThrough (optional)"
  }
}
```

**Example:**
```json
{
  "content": "This is a sample text paragraph with some information.",
  "alignment": "left",
  "maxLines": 3,
  "overflow": "ellipsis",
  "style": {
    "fontSize": 14,
    "color": "#666666"
  }
}
```

---

## 3. Button Component

**Type:** `button`

**Description:** Interactive button with actions.

**Schema:**
```json
{
  "label": "string (required)",
  "action": "api_call|navigate|submit|custom (required)",
  "endpoint": "string (required if action=api_call)",
  "method": "GET|POST|PUT|DELETE (required if action=api_call)",
  "route": "string (required if action=navigate)",
  "payload": "object (optional, for api_call)",
  "disabled": "boolean (optional, default: false)",
  "loading": "boolean (optional, default: false)",
  "style": {
    "backgroundColor": "string (hex color, optional, default: #007bff)",
    "textColor": "string (hex color, optional, default: #ffffff)",
    "borderRadius": "number (optional, default: 4)",
    "borderColor": "string (hex color, optional)",
    "borderWidth": "number (optional)",
    "width": "string|number (optional, e.g., '100%' or 200)",
    "height": "number (optional)",
    "padding": "number (optional)"
  }
}
```

**Example:**
```json
{
  "label": "Sign In",
  "action": "api_call",
  "endpoint": "/api/auth/login",
  "method": "POST",
  "style": {
    "backgroundColor": "#007bff",
    "textColor": "#ffffff",
    "borderRadius": 8,
    "width": "100%",
    "height": 48
  }
}
```

---

## 4. Input Component

**Type:** `input`

**Description:** Form input field.

**Schema:**
```json
{
  "type": "text|email|password|number|tel|url|date (required)",
  "name": "string (required)",
  "label": "string (optional)",
  "placeholder": "string (optional)",
  "value": "string (optional, default value)",
  "required": "boolean (optional, default: false)",
  "disabled": "boolean (optional, default: false)",
  "readonly": "boolean (optional, default: false)",
  "maxLength": "number (optional)",
  "minLength": "number (optional)",
  "pattern": "string (regex pattern, optional)",
  "validation": "array of strings (optional, e.g., ['email', 'required'])",
  "errorMessage": "string (optional)",
  "helperText": "string (optional)",
  "style": {
    "borderColor": "string (hex color, optional)",
    "borderRadius": "number (optional)",
    "backgroundColor": "string (hex color, optional)",
    "textColor": "string (hex color, optional)"
  }
}
```

**Example:**
```json
{
  "type": "email",
  "name": "email",
  "label": "Email Address",
  "placeholder": "Enter your email",
  "required": true,
  "validation": ["email", "required"],
  "errorMessage": "Please enter a valid email",
  "style": {
    "borderRadius": 4,
    "borderColor": "#cccccc"
  }
}
```

---

## 5. Image Component

**Type:** `image`

**Description:** Display images.

**Schema:**
```json
{
  "url": "string (required, image URL)",
  "alt": "string (optional, alt text)",
  "width": "string|number (optional, e.g., '100%' or 300)",
  "height": "string|number (optional, e.g., 'auto' or 200)",
  "fit": "cover|contain|fill|fitWidth|fitHeight (optional, default: cover)",
  "alignment": "left|center|right (optional, default: center)",
  "borderRadius": "number (optional)",
  "clickable": "boolean (optional, default: false)",
  "action": "navigate|zoom|custom (optional, if clickable=true)",
  "route": "string (optional, if action=navigate)"
}
```

**Example:**
```json
{
  "url": "https://example.com/logo.png",
  "alt": "Company Logo",
  "width": "100%",
  "height": 200,
  "fit": "contain",
  "alignment": "center",
  "borderRadius": 8
}
```

---

## 6. Card Component

**Type:** `card`

**Description:** Content card with optional actions.

**Schema:**
```json
{
  "title": "string (optional)",
  "subtitle": "string (optional)",
  "content": "string (optional)",
  "imageUrl": "string (optional)",
  "action": "navigate|api_call|none (optional)",
  "route": "string (optional, if action=navigate)",
  "endpoint": "string (optional, if action=api_call)",
  "elevation": "number (optional, default: 2)",
  "style": {
    "backgroundColor": "string (hex color, optional, default: #ffffff)",
    "borderRadius": "number (optional, default: 8)",
    "padding": "number (optional, default: 16)",
    "margin": "number (optional)",
    "borderColor": "string (hex color, optional)",
    "borderWidth": "number (optional)"
  }
}
```

**Example:**
```json
{
  "title": "Today's Tasks",
  "subtitle": "5 pending",
  "content": "You have 5 tasks to complete today",
  "action": "navigate",
  "route": "/tasks",
  "elevation": 2,
  "style": {
    "backgroundColor": "#f8f9fa",
    "borderRadius": 12,
    "padding": 20
  }
}
```

---

## 7. List Component

**Type:** `list`

**Description:** Display a list of items.

**Schema:**
```json
{
  "items": [
    {
      "id": "string|number (required)",
      "title": "string (required)",
      "subtitle": "string (optional)",
      "imageUrl": "string (optional)",
      "action": "navigate|api_call|none (optional)",
      "route": "string (optional)",
      "data": "object (optional, custom data)"
    }
  ],
  "scrollable": "boolean (optional, default: true)",
  "divider": "boolean (optional, default: true)",
  "style": {
    "itemPadding": "number (optional)",
    "itemHeight": "number (optional)",
    "backgroundColor": "string (hex color, optional)"
  }
}
```

**Example:**
```json
{
  "items": [
    {
      "id": 1,
      "title": "Task 1",
      "subtitle": "Due today",
      "action": "navigate",
      "route": "/tasks/1"
    },
    {
      "id": 2,
      "title": "Task 2",
      "subtitle": "Due tomorrow",
      "action": "navigate",
      "route": "/tasks/2"
    }
  ],
  "scrollable": true,
  "divider": true
}
```

---

## 8. Form Component

**Type:** `form`

**Description:** Complete form with multiple fields.

**Schema:**
```json
{
  "fields": [
    {
      "type": "text|email|password|number|select|checkbox|radio",
      "name": "string (required)",
      "label": "string (optional)",
      "placeholder": "string (optional)",
      "required": "boolean (optional)",
      "options": "array (required for select/radio)",
      "validation": "array (optional)"
    }
  ],
  "submitButton": {
    "label": "string (required)",
    "endpoint": "string (required)",
    "method": "POST|PUT|PATCH (required)"
  },
  "style": {
    "spacing": "number (optional, space between fields)",
    "backgroundColor": "string (hex color, optional)"
  }
}
```

**Example:**
```json
{
  "fields": [
    {
      "type": "text",
      "name": "name",
      "label": "Full Name",
      "required": true
    },
    {
      "type": "email",
      "name": "email",
      "label": "Email",
      "required": true,
      "validation": ["email"]
    }
  ],
  "submitButton": {
    "label": "Submit",
    "endpoint": "/api/submit-form",
    "method": "POST"
  }
}
```

---

## 9. Divider Component

**Type:** `divider`

**Description:** Visual separator line.

**Schema:**
```json
{
  "thickness": "number (optional, default: 1)",
  "color": "string (hex color, optional, default: #e0e0e0)",
  "indent": "number (optional, left/right indent)",
  "height": "number (optional, vertical spacing)"
}
```

**Example:**
```json
{
  "thickness": 1,
  "color": "#e0e0e0",
  "indent": 16,
  "height": 20
}
```

---

## 10. Spacer Component

**Type:** `spacer`

**Description:** Empty space for layout.

**Schema:**
```json
{
  "height": "number (optional, vertical space)",
  "width": "number (optional, horizontal space)"
}
```

**Example:**
```json
{
  "height": 24
}
```

---

## 11. Grid Component

**Type:** `grid`

**Description:** Grid layout for items.

**Schema:**
```json
{
  "columns": "number (required, number of columns)",
  "spacing": "number (optional, space between items)",
  "items": [
    {
      "id": "string|number (required)",
      "content": "object (component definition)"
    }
  ]
}
```

---

## 12. Carousel Component

**Type:** `carousel`

**Description:** Horizontal scrolling carousel.

**Schema:**
```json
{
  "items": [
    {
      "id": "string|number (required)",
      "imageUrl": "string (optional)",
      "title": "string (optional)",
      "content": "string (optional)"
    }
  ],
  "autoPlay": "boolean (optional, default: false)",
  "interval": "number (optional, milliseconds)",
  "height": "number (optional)"
}
```

---

## 13. Tabs Component

**Type:** `tabs`

**Description:** Tabbed interface.

**Schema:**
```json
{
  "tabs": [
    {
      "id": "string (required)",
      "label": "string (required)",
      "icon": "string (optional)",
      "content": "array (components to display)"
    }
  ],
  "initialTab": "string (optional, tab id)"
}
```

---

## 14. Accordion Component

**Type:** `accordion`

**Description:** Expandable/collapsible sections.

**Schema:**
```json
{
  "sections": [
    {
      "id": "string (required)",
      "title": "string (required)",
      "content": "string (required)",
      "expanded": "boolean (optional, default: false)"
    }
  ],
  "allowMultiple": "boolean (optional, default: false)"
}
```

---

## Common Style Properties

All components support these common style properties:

```json
{
  "style": {
    "margin": "number (all sides) or object {top, right, bottom, left}",
    "padding": "number (all sides) or object {top, right, bottom, left}",
    "backgroundColor": "string (hex color)",
    "borderRadius": "number",
    "borderColor": "string (hex color)",
    "borderWidth": "number",
    "elevation": "number (shadow depth)",
    "opacity": "number (0-1)"
  }
}
```

---

## Validation Rules

Supported validation rules for input fields:

- `required` - Field is required
- `email` - Must be valid email
- `url` - Must be valid URL
- `numeric` - Must be numeric
- `min:value` - Minimum value/length
- `max:value` - Maximum value/length
- `regex:pattern` - Must match regex pattern
- `confirmed` - Must match confirmation field

---

## Action Types

Supported action types for interactive components:

- `api_call` - Make API request
- `navigate` - Navigate to route
- `submit` - Submit form
- `open_url` - Open external URL
- `share` - Share content
- `call` - Make phone call
- `email` - Send email
- `custom` - Custom action (handled by app)

---

**Note:** This is a living document. Component schemas may be extended based on requirements.

**Version:** 1.0.0
**Last Updated:** 2025-09-30

