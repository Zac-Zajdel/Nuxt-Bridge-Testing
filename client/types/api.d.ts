
export interface MetApiResponse {
  benchmark: number
  status: 'success' | 'failure'
  query: {
    options: Record<string, any>
    params: Record<string, any>
  }
  paginate?: {
    current_page: number
    first_item: number
    last_item: number
    last_page: number
    pages: Array<number>
    per_page: number
    total: number
  }
  data: any
}

export interface User {
  name: string
  job: string
  email: string
  phone: string
  avatar: string
}
export type Users = Array<User>

export interface Blog {
  id: number
  title: string
  user_id: number
  body: string
  published_at: Date|null
  created_at: Date
  updated_at: Date
  deleted_at: Date|null

  // relationships
  user?: Object
}
export type Blogs = Array<Blog>
